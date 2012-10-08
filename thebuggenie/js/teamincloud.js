// namespaces
var TIC = {
    classes:{},
    init:function(){},
    preinit:function(){},
    objects:[],
    helpers:{},
    urls:{}
};

// Definitions

TIC._run_jQuery_style = function(f){
    f(jQuery);
};

TIC.init = function(){
    for(var i=0;i<TIC.objects.length;i++){
        if('init' in TIC.objects[i]) {
            try{
                TIC.objects[i].init();
            }catch(e){
                
            }
        }
    }
};

TIC._run_jQuery_style(function($){
    TIC.classes.TeamGrouping = function(el){
        el.nestedSortable({
            handle: 'div.nested-sort-handel',
            helper: 'clone',
            items: 'li',
            opacity: .6,
            placeholder: 'placeholder',
            stop:function(e,ui){
                TBG.Main.Helpers.ajax(
                    TIC.urls.saveTeamGrouping,{
                    params:JSON.stringify(TIC.helpers.dump($(this).nestedSortable('toHierarchy', {startDepthCount: 0}),0)),
                    success:{
                        callback:function(r){
                            console.log(r);
                        }
                    }
                });
            }
        });
    }
});

// overwrite TBG.initialize in order to call our init and preinit functions

var proxy = TBG.initialize;
TBG.initialize = function(){
    TIC.preinit();
    proxy.apply(TBG,arguments);
    TIC.init();
};

// helper functions

TIC._run_jQuery_style(function($){
    TIC.helpers.dump = function(arr,child) {
        console.log(arr);
        var data = [];
        for(var i=0;i<arr.length;i++){
            if('children' in arr[i]){
                $.merge(data,TIC.helpers.dump(arr[i].children,arr[i].id))
            }
            data.push({child:child,id:arr[i].id})
            
        }
        return data;
    }
});



var template_progressbar = {
    value:0,
    max:100,
    bar:null,
    
    start:function() {
        this.bar=jq1112("#main_template_progressbar div:first-child");
        this.bar.css({"width":"5%","display":""});
     //   console.log("template_progressbar start");
    },
    setprogress:function(w) {
        this.bar.css({"width":w+"%"});
     //   console.log("template_progressbar "+w);
    },
    end:function() {
        this.bar.css("width","100%");
     //   console.log("template_progressbar end");
        setTimeout(function() { 
            template_progressbar.bar.css("display","none");
            template_progressbar.bar.css("width","0%");
        },1000);
    }
}

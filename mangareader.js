

function ReaderController(fileList)
{
    this.files=new Array();
    this.files=fileList;
    this.currIndex=0;
    this.totalIndex=function(){return (this.files.length-1)};
    this.next=function(){this.currIndex=this.currIndex+1};
    this.prev=function(){this.currIndex=this.currIndex-1};
    this.reloadManga=function(){
        console.log(this.currIndex);
        $("#main-manga-image").attr("src",this.files[this.currIndex]);
    }
}

var filePath="http://localhost/mangareader/mangaFiles/non_non/Non Non Biyori Chapter 34 Page ";

var fileLists=new Array();
for(var i=1;i<=18;i++)
{
    fileLists[i-1]=filePath+i+".jpg";
}

var controller=new ReaderController(fileLists);
controller.reloadManga();
document.getElementsByTagName("body")[0].onclick=function(event)
{
    event=event || window.event;
    var target=event.target || event.srcElement;

    if(target.className.indexOf('prev-nav')!==-1)
    {
        controller.prev();
        if(controller.currIndex<0)
        {
            controller.next();
            return;
        }else
        {
            controller.reloadManga();
        }
    }
    
    if(target.className.indexOf('next-nav')!==-1)
    {
        controller.next();
        if(controller.currIndex>controller.totalIndex())
        {
            controller.prev();
            return;
        }else
        {
            controller.reloadManga();
        }
    }
}
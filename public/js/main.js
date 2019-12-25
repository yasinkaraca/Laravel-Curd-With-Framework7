
var mApp = new Framework7();  

var $$ = Dom7;

$$('.convert-form-to-data').on('click', getFormData);
$$('.reset-form').on('click', function(){
    document.getElementById('mForm').reset();
});

var searchbar = mApp.searchbar.create({
    el: '.searchbar',
    customSearch: true,
    on: {
        search(searchbar, query){
            findStudents(query, 'no', 'asc', 1);
        }
    }
});

if(document.getElementById("col") != null){
    var updown = (document.getElementById("asc").innerHTML == "asc")? "&nbsp;&#x25b2;" : "&nbsp;&#x25bc;";
    var column = document.getElementById("col").innerHTML;
    header = document.getElementById("h" + column[0].toUpperCase() + column.slice(1));
    header.innerHTML += updown;
    console.log(header.innerHTML);
    header.style.color = "#8888ff";
}

function getFormData(){
    var data = mApp.form.convertToData('#mForm');
    if(this.innerHTML == "Save"){
        mApp.request.get("/save/" + data.no, data, function(data){ window.document.body.innerHTML = data; });//location.href = "/?col=no&asc=asc&page=1&where=";
        
    }
    else
        mApp.request.get("/add", data, function(data){ window.document.body.innerHTML = data; });
    
}

function arrange(column, col, asc, page, where){

    if(column != col){
        col = column;
        asc = 'asc';
    }
    else
        asc = (asc == 'asc')? 'desc':'asc';

    if(where != ""){
        mApp.request.get("/findStudents", {col: col, asc: asc, page: page, where: where}, function(data){ 
            document.getElementById("content").innerHTML = data;
            var updown = (document.getElementById("asc").innerHTML == "asc")? "&nbsp;&#x25b2;" : "&nbsp;&#x25bc;";
            var column = document.getElementById("col").innerHTML;
            var header = document.getElementById("h" + column[0].toUpperCase() + column.slice(1));
            header.innerHTML += updown;
            header.style.color = "#8888ff";
        });
        mApp.request.get("/links", {col: col, asc: asc, page: page, where: where}, function(data){ 
            document.getElementById("links").innerHTML = data;
        });
    }
    else
        location.href = "/?col=" + col + "&asc=" + asc + "&page=" + page + "&where=" + where;
        
}

function findStudents(query, col, asc, page){

    var request = new XMLHttpRequest();
    request.open("GET", "/findStudents?col=" + col + "&asc=" + asc + "&page=" + page + "&where=" + query);
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("content").innerHTML = this.responseText;
            var updown = (asc == "asc")? "&nbsp;&#x25b2;" : "&nbsp;&#x25bc;";
            var header = document.getElementById("h" + col[0].toUpperCase() + col.slice(1));
            header.innerHTML += updown;
            header.style.color = "#8888ff";
            getLinks(query, col, asc, page);
        }
    };
    request.send();
    
}
function getLinks(query, col, asc, page){
    var request = new XMLHttpRequest();
    request.open("GET", "/links?col=" + col + "&asc=" + asc + "&page=" + page + "&where=" + query);
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
            document.getElementById("links").innerHTML = this.responseText; 
    };
    request.send();
}

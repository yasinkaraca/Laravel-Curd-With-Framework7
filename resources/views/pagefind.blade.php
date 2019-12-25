<!--<script> document.getElementById("links").innerHTML = '{{ $students -> links() }}'; </script>-->
<script>
    var request = new XMLHttpRequest();
    request.open("GET", "/findStudents?col=" + "{{ $column }}" + "&asc=" + "{{ $asc }}" + "&page=" + "{{ $page }}" + "where=" + "{{ $where }}");
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("content").innerHTML = this.responseText;
            //document.body.innerHTML = this.responseText;
            //searchbar.enable(); 
            //document.getElementById("sInput").value = query;
        }
    };
    request.send();
</script>
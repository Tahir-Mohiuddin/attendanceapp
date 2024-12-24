$(function(e){
    $(document).on("keyup","input",function(e){
        let un=$("#txtusername").val();
        let pw=$("#txtpassword").val();
        if(un.trim()=="" || pw.trim()==""){
            $("#btnLogin").removeClass("activecolor");
            $("#btnLogin").addClass("inactivecolor");
        }
        else{
            $("#btnLogin").removeClass("inactivecolor");
            $("#btnLogin").addClass("activecolor");
        }
    });
});
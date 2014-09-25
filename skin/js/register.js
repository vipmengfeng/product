// JavaScript Document

function getFocus() //设置用户名文本框获取焦点
{
    document.getElementById("username").focus();
}

function checkname() //检查用户名
{
	alert(132);
    var myname = document.getElementById("username").value;
    var myDivname = document.getElementById("mesname");
    if (myname == "") {
        myDivname.innerHTML = "<font color='red'>用户名不能为空!</font>";
        return false;
    } else if (myname.length < 6) {
        myDivname.innerHTML = "<font color='red'>账号至少应为六位!</font>";
        return false;
    }
    for (var i = 0; i < myname.length; i++) {
        var text = myname.charAt(i);
        if (!(text <= 9 && text >= 0) && !(text >= 'a' && text <= 'z') && !(text >= 'A' && text <= 'Z') && text != "_") {
            myDivname.innerHTML = "<font color='red'>用户名只能是数字、字母、下划线组成！</font>";
            break;
        }
    }
    if (i >= myname.length) {
		$.get("register.php",{username:myname},function(data){
			if(data == "ok"){
			 myDivname.innerHTML = "<font color='red'>√</font>";
				 return true;
			}else{
				myDivname.innerHTML = "<font color='red'>用户名已经被注册</font>";
				 return false;
			}
		})
       
        
    }
}

function checkuserpassword() //检查密码
{
    var mypassword = document.getElementById("password").value;
    var myDivpassword = document.getElementById("mespassword");
    if (mypassword == "") {
        myDivpassword.innerHTML = "<font color='red'>密码不能为空!</font>";
        return false;
    } else if (mypassword.length < 6) {
        myDivpassword.innerHTML = "<font color='red'>密码至少应为六位!</font>";
        return false;
    } else {
        myDivpassword.innerHTML = "<font color='red'>√</font>";
        return true;
    }
}

function checkpwdagin() //检查确认密码
{
    var myispassword = document.getElementById("rpassword").value;
    var myDivispassword = document.getElementById("mesrpassword");
    if (myispassword == "") {
        myDivispassword.innerHTML = "<font color='red'>确认密码不能为空!</font>";
        return false;
    } else if (document.getElementById("password").value != document.getElementById("rpassword").value) {
        myDivispassword.innerHTML = "<font color='red'>确认密码与密码不一致!</font>";
        return false;
    } else {
        myDivispassword.innerHTML = "<font color='red'>√</font>";
        return true;
    }
}

function checktelephone() //检查电话号码
{
    var mytelephone = document.getElementById("phone").value;
    var myDivtelephone = document.getElementById("mesphone");
    if (mytelephone == "") {
        myDivtelephone.innerHTML = "<font color='red'>手机号不能为空</font>";
        return false;
    }

    if (mytelephone != "") {
        var reg = /^[0-9]{11}$/i;
        if (!reg.test(mytelephone)) {
            myDivtelephone.innerHTML = "<font color='red'>只能输入11位数字！例：13595144582或08514785214</font>";
            return false;
        } else {
            myDivtelephone.innerHTML = "<font color='red'>√</font>";
            return true;
        }
    } else {
        myDivtelephone.innerHTML = "<font color='red'>√</font>";
        return true;
    }
}

function checkemail() //检查E-mail
{
    var myemail = document.getElementById("email").value;
    var myDivemail = document.getElementById("mesemail");
    if (myemail == "") {
        myDivemail.innerHTML = "<font color='red'>邮箱不能为空</font>";
        return false;
    }
    if (myemail != "") {
        if (myemail.indexOf("@") == -1 || myemail.indexOf(".") == -1 || (myemail.indexOf("@") > myemail.indexOf("."))) {
            myDivemail.innerHTML = "<font color='red'>E-mail格式不正确！例：jiie@163.com</font>";
            return false;
        } else {
            myDivemail.innerHTML = "<font color='red'>√</font>";
            return true;
        }
    } else {
        myDivemail.innerHTML = "<font color='red'>√</font>";
        return true;
    }
}

function checkqq() //检查QQ号码
{
    var myqq = document.getElementById("txtqq").value;
    var myDivqq = document.getElementById("divqq");
    if (myqq != "") {
        if (myqq.match(/\D/) != null) {
            myDivqq.innerHTML = "<font color='red'>QQ号码只能输入数字！</font>";
            return false;
        } else {
            myDivqq.innerHTML = "<font color='red'>√</font>";
            return true;
        }
    } else {
        myDivqq.innerHTML = "<font color='red'>√</font>";
        return true;
    }
}

function checkall() //检查所有
{
    if (checkname() && checkuserpassword() && checkpwdagin() && checktelephone() && checkemail() && checkqq()) {
        return true;
    }
    return false;
}

//复选框的选中与否是按钮的状态


function checkcjkx() {
    var a = document.form1.btnregister;
    if (a == null) {
        return
    }
    if (document.form1.ckbxcjkx != null) {
        if (document.form1.ckbxcjkx.checked) {
            a.disabled = false;
            return
        } else {
            a.disabled = true;
            return
        }
    } else {
        a.disabled = true;
        return
    }
}
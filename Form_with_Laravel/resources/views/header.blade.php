<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
</head>
<style>
    *{
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

    header{
    background-color: rgb(207, 206, 206);
    width: 100%;
    
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 17px 80px;
}
.name{
    text-decoration: none;
    color:darkblue;
    font-weight: 700;
    font-size: xx-large;
}
    .navigation_bar a{
    text-decoration: none;
    color: black;
    font-weight: 700;
    padding-left: 20px;

}
.navigation_bar a:hover{
    color:grey;
}
section{
    padding: 200px 200px;
}
</style>
<body>
<header>
        <p class="name">{{__('messages.registration form')}}</p>
        <nav class="navigation_bar">
        <nav class="navigation_bar">
            <a>{{__('messages.home')}}<i class="fa fa-home"></i></a>
            <a>{{__('messages.about us')}} <i class="fa fa-user-plus"></i></a>
            <a>{{__('messages.ask')}}<i class="fas fa-search"></i></i></a>
        <a onclick="switchLanguage('en')" id="en">
           English
            </a>
           <a onclick="switchLanguage('ar')" id="ar">
           العربية
           </a>
            
        </nav>
    </header>
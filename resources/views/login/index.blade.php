<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: rgb(119, 109, 110);  
}  
button {   
       background-color: #4CAF50;   
       width: 100%;  
        color: rgb(255, 255, 255);   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   
</style>   
</head>    
<body>    
    <center> <h1>Login</h1> </center> 
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  
    <form method="POST" action="{{ route('login.post') }}" class="form pt-3">
        @csrf  
        <div class="container">   
            <label>Email : </label>   
            <input type="text" placeholder="Enter Username" name="email" id="email" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" id="password" required>  
            <button type="submit">Login</button>    
             
        </div>   
    </form>     
</body>     
</html>  
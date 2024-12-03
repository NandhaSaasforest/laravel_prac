<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>

<body>
    <p>Welcome page</p>

    <!-- Task 1 -->
    <h3>Task 1</h3>
    <form action="/calculate" method="post">
        @csrf
        <label>Number 1: <input type="number" name="num1" required></label>
        <br>
        <label>Number 2: <input type="number" name="num2" required></label>
        <br>
        <input type="radio" name="ope" value="add" id="add" required>
        <label for="add">Add</label>
        <input type="radio" name="ope" value="sub" id="sub">
        <label for="sub">Subtract</label>
        <input type="radio" name="ope" value="mul" id="mul">
        <label for="mul">Multiply</label>
        <input type="radio" name="ope" value="quo" id="quo">
        <label for="div">Quotiont</label>
        <br>
        <button type="submit">Calculate</button>
        @isset($total)
            Total : {{$total}}
        @endisset
    </form>

    <hr>
    {{-- Task 2 --}}
    <h3>Task 1</h3>
    @php
    
    for ($i = 0; $i <= 100; $i++) {
        if ($i % 3 == 0) {
            echo "Fizz\n";
        } elseif ($i % 5 == 0) {
            echo "Buzz\n";
        } elseif ($i % 3 == 0 && $i % 5 == 0) {
            echo "FizzBuzz\n";
        } else {
            echo "$i \n";
        }
    }
    @endphp
    
    <hr>
    {{-- Task 3 --}}
    <h3>Task 3</h3>

    @php

    // Function to calculate the factorial of a number
        function factorial($n)
            {
                if ($n == 1) {
                    return 1;
                }
                return $n * factorial($n - 1);
            }

    @endphp
    @for ($i = 1; $i <= 10; $i++)
         <p>Factorial of {{ $i }} is {{ factorial($i) }}</p>
    @endfor
    

    <hr>
    {{-- Task 4 --}}
    <h3>Task 4</h3>

    @php
            // Array to store student names and their marks
        $students = [
            'Nandha' => 85,
            'Bhavan' => 92,
            'Kalyan' => 78,
            'Siva' => 95,
            'Jeeva' => 88,
        ];
        
        $highestMark = max($students);
        $highestStudent = array_search($highestMark, $students);
        
        $lowestMark = min($students);
        $lowestStudent = array_search($lowestMark, $students);
        
        foreach ($students as $key => $value) {
            echo "$key scored $value <br>";
        }
        
        echo "Highest Marks: $highestMark by $highestStudent <br>";
        echo "Lowest Marks: $lowestMark by $lowestStudent";

    @endphp
    
    <hr>
    {{-- Task 5 --}}
    <h3>Task 5</h3>

    <!-- To display submitted information -->
    <form action="\info" method="get">
        <label for="name">Name: <input type="text" name="name"></label>
        <label for="email">Email: <input type="email" name="email"></label>
        <button type="submit">Submit</button>
        @isset($name)
        <br>    
        Name:{{$name}} 
        <br> 
        Email:{{$email}}
        @endisset
    </form>
        
    <hr>
    {{-- Task 6 --}}
    <h3>Task 6</h3>
    <h4>Login</h4>
    @if (isset($error))
        <p style="color: red;">{{ $error }}</p>
    @endif
    <form method="POST" action="\login">
        @csrf
        <label>Username: <input type="text" name="u_name"></label><br>
        <label>Password: <input type="password" name="pass"></label><br>
        <button type="submit">Login</button>
    </form>

    <hr>
    {{-- Task 7 --}}
    <h3>Task 7</h3>

    @if (isset($success))
        <p style="color: green;">{{$success}}</p>
    @elseif (isset($error))
        <p style="color: red;"><?php echo $error; ?></p>
    @endif

    @if (isset($imagePath))
        <img src="/storage/{{$imagePath}}" alt="Uploaded Image" style="max-width: 300px;">
    @endif
    

    <form action="\handleUpload" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Choose an image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <br><br>
        <button type="submit">Upload</button>
    </form>
</body>

</html>

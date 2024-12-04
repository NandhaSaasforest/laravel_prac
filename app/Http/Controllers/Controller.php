<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\Request;

class Controller
{
    public function index(Request $request)
    {

        return view('welcome');
    }

    public function calculate(Request $request)
    {
        $result = '';
        if ($request->num1 && $request->num2 && $request->ope) {
            $num1 = $request->num1;
            $num2 = $request->num2;
            $operation = $request->ope;

            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'sub':
                    $result = $num1 - $num2;
                    break;
                case 'mul':
                    $result = $num1 * $num2;
                    break;
                case 'quo':
                    $result = $num2 != 0 ? intdiv($num1, $num2) : 'Error: Cannot divide by zero';
                    break;
                default:
                    $result = 'Invalid operation';
                    break;
            }
        }
        return view('welcome', ['total' => $result]);
    }

    public function info()
    {
        if (isset($_GET['name']) && isset($_GET['email'])) {
            $name = $_GET['name'];
            $email = $_GET['email'];
            return view('welcome', ['name' => $name, 'email' => $email]);
        }
    }

    public function login(Request $request)
    {

        session_start();

        $validUsername = "admin";
        $validPassword = "12345";

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['u_name']) && isset($_POST['pass'])) {
            $name = $_POST['u_name'];
            $password = $_POST['pass'];

            if ($name === $validUsername && $password === $validPassword) {
                // Store session data
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $name;
                return view('login', ['name' => $name, 'pass' => $password]);
            } else {
                $error = "Invalid username or password";
                return view("welcome", ["error" => $error ?? null]);
            }
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        return view('welcome');
    }

    public function handleUpload(Request $request)
    {
        // Validate the file
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png|max:2048', // Only images, max size 2MB
        ]);

        // Store the file
        if ($request->hasFile('image')) {
            $path = $request->file('image');
            $image = Storage::put("uploads", $path);
            $success = "File uploaded successfully!";
            return view('welcome', ['success' => $success, 'imagePath' => $image]);
        }

        return back()->with('error', 'Failed to upload the file.');
    }
}

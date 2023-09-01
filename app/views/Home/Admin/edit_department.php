<!DOCTYPE html>
<html>
<head>
    <title>Edit Department</title>
    <!-- Include your CSS and JavaScript libraries here -->
</head>
<body>
    <div class="container">
        <form class="add-department-section" method="post" action="edit">
            <h1>Edit Department</h1>
            <input type="hidden" name="Id" value="<?= $data['id'] ?>">
            <div class="add-department-form">
                <div class="form-group">
                    <label for="department_name">Department Name:</label>
                    <input type="text" id="department_name" name="department_name" placeholder="Enter Department Name" required>
                </div>
                <div class="form-group">
                    <label for="head_department">Head Department:</label>
                    <input type="text" id="head_department" name="head_department" placeholder="Enter Head Department" required>
                </div>
                <button type="submit" name="edit">Submit</button>
            </div>
        </form>
    </div>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .add-department-section h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .add-department-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #22c55e;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1c9951;
        }
    </style>
</body>
</html>

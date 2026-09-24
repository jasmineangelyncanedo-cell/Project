<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add New Task</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #fff5fb;
            color: #4a3b52;
        }

        /* =========================
           NAVIGATION
        ========================= */

        nav {
            background: linear-gradient(135deg, #e85aad, #9b5de5);
            color: white;
            padding: 18px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(155, 93, 229, 0.25);
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .nav-text {
            font-size: 14px;
        }

        /* =========================
           MAIN CONTAINER
        ========================= */

        .container {
            width: 90%;
            max-width: 650px;
            margin: 40px auto;
        }

        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(155, 93, 229, 0.15);
            border: 1px solid #f0d7ed;
        }

        .form-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .form-icon {
            font-size: 45px;
            margin-bottom: 10px;
        }

        h1 {
            color: #8e44ad;
            margin: 0;
        }

        .subtitle {
            color: #9b7c9f;
            margin-top: 8px;
            font-size: 14px;
        }

        /* =========================
           FORM
        ========================= */

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 7px;
            font-weight: bold;
            color: #673a75;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #e5c8e7;
            border-radius: 10px;
            background: #fffafd;
            color: #4a3b52;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #a855f7;
            box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.10);
        }

        textarea {
            height: 130px;
            resize: vertical;
        }

        /* =========================
           ADD BUTTON
        ========================= */

        .add-button {
            width: 100%;
            margin-top: 25px;
            background: #8e44ad;
            color: white;
            border: none;
            padding: 13px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(142, 68, 173, 0.25);
        }

        .add-button:hover {
            background: #732d91;
        }

        /* =========================
           BACK BUTTON
        ========================= */

        .back-button {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #8e44ad;
            text-decoration: none;
            font-weight: bold;
        }

        .back-button:hover {
            color: #e85aad;
        }

        /* =========================
           ERROR MESSAGE
        ========================= */

        .error {
            background: #fff0f7;
            border: 1px solid #f3b6d7;
            color: #9b356d;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .error ul {
            margin: 0;
            padding-left: 20px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 600px) {

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .form-card {
                padding: 25px;
            }

            .logo {
                font-size: 18px;
            }

            .nav-text {
                display: none;
            }

        }

    </style>
</head>

<body>

    <!-- NAVIGATION -->

    <nav>

        <div class="logo">
            🎀 My Task Manager
        </div>

        <div class="nav-text">
            Create a new task ✨
        </div>

    </nav>


    <!-- MAIN -->

    <div class="container">

        <div class="form-card">

            <div class="form-header">

                <div class="form-icon">
                    🌸
                </div>

                <h1>
                    Add New Task
                </h1>

                <p class="subtitle">
                    Create a task and stay organized 💕
                </p>

            </div>


            @if($errors->any())

                <div class="error">

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- ADD TASK FORM -->

            <form
                action="/tasks"
                method="POST"
            >

                @csrf


                <!-- TASK NAME -->

                <label for="task_name">
                    📝 Task Name
                </label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ old('task_name') }}"
                    placeholder="Enter your task..."
                    required
                >


                <!-- DESCRIPTION -->

                <label for="description">
                    💭 Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Write something about your task..."
                >{{ old('description') }}</textarea>


                <!-- STATUS -->

                <label for="status">
                    🌷 Status
                </label>

                <select
                    id="status"
                    name="status"
                >

                    <option value="Pending">
                        🌸 Pending
                    </option>

                    <option value="Completed">
                        ✨ Completed
                    </option>

                </select>


                <!-- DUE DATE -->

                <label for="due_date">
                    📅 Due Date
                </label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date') }}"
                >


                <!-- ADD TASK -->

                <button
                    type="submit"
                    class="add-button"
                >
                    💜 Add Task
                </button>

            </form>


            <!-- BACK -->

            <a
                href="/"
                class="back-button"
            >
                ← Back to My Tasks
            </a>

        </div>

    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

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
            opacity: 0.95;
        }

        /* =========================
           DASHBOARD HEADER
        ========================= */

        .dashboard {
            width: 90%;
            max-width: 1100px;
            margin: 35px auto 20px;
        }

        .welcome-card {
            background: linear-gradient(135deg, #f7b2d9, #d8b4fe);
            border-radius: 20px;
            padding: 30px;
            color: #4a235a;
            box-shadow: 0 8px 25px rgba(155, 93, 229, 0.15);
        }

        .welcome-card h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .welcome-card p {
            margin: 0;
            font-size: 15px;
        }

        /* =========================
           STATISTICS CARDS
        ========================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 25px;
        }

        .stat-card {
            background: white;
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 5px 18px rgba(155, 93, 229, 0.12);
            border: 1px solid #f1d5ed;
        }

        .stat-card h3 {
            margin: 0 0 8px;
            font-size: 14px;
            color: #8b6f91;
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
            color: #8e44ad;
        }

        .stat-icon {
            font-size: 25px;
            float: right;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 25px auto 50px;
        }

        .task-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .task-header h2 {
            color: #673a75;
            margin: 0;
        }

        /* =========================
           ADD BUTTON
        ========================= */

        .add-button {
            background: #8e44ad;
            color: white;
            padding: 11px 18px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(142, 68, 173, 0.25);
        }

        .add-button:hover {
            background: #732d91;
        }

        /* =========================
           SUCCESS MESSAGE
        ========================= */

        .success {
            background: #fce4f3;
            border-left: 5px solid #e85aad;
            color: #7a3f66;
            padding: 14px 18px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        /* =========================
           TASK CARD
        ========================= */

        .task-card {
            background: white;
            padding: 20px;
            border-radius: 18px;
            box-shadow: 0 6px 20px rgba(155, 93, 229, 0.10);
            border: 1px solid #f0d7ed;
            overflow-x: auto;
        }

        /* =========================
           TABLE
        ========================= */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #9b5de5;
            color: white;
            padding: 14px;
            text-align: left;
            font-size: 14px;
        }

        th:first-child {
            border-radius: 10px 0 0 10px;
        }

        th:last-child {
            border-radius: 0 10px 10px 0;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #f0dff0;
        }

        tr:hover {
            background: #fff6fc;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .pending {
            background: #ffe1f0;
            color: #c43d82;
        }

        .completed {
            background: #e8d9ff;
            color: #7b3fc6;
        }

        /* =========================
           ACTION BUTTONS
        ========================= */

        .actions {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .actions form {
            display: inline;
            margin: 0;
        }

        .edit-button,
        .complete-button,
        .delete-button {
            border: none;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .edit-button {
            background: #a855f7;
        }

        .edit-button:hover {
            background: #9333ea;
        }

        .complete-button {
            background: #8e44ad;
        }

        .complete-button:hover {
            background: #732d91;
        }

        .delete-button {
            background: #e85aad;
        }

        .delete-button:hover {
            background: #d94691;
        }

        /* =========================
           EMPTY TASK
        ========================= */

        .empty {
            text-align: center;
            padding: 40px;
            color: #977e9c;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 10px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .stats {
                grid-template-columns: 1fr;
            }

            .task-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .actions a,
            .actions button {
                width: 100%;
                text-align: center;
            }

            .welcome-card h1 {
                font-size: 24px;
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
            Stay organized ✨
        </div>

    </nav>


    <!-- DASHBOARD -->

    <div class="dashboard">

        <div class="welcome-card">

            <h1>
                Hello! Welcome back 💕
            </h1>

            <p>
                Keep your tasks organized and get things done!
            </p>

        </div>


        <!-- STATISTICS -->

        <div class="stats">

            <div class="stat-card">

                <span class="stat-icon">📝</span>

                <h3>Total Tasks</h3>

                <div class="stat-number">
                    {{ $tasks->count() }}
                </div>

            </div>


            <div class="stat-card">

                <span class="stat-icon">🌸</span>

                <h3>Pending</h3>

                <div class="stat-number">
                    {{ $tasks->where('status', 'Pending')->count() }}
                </div>

            </div>


            <div class="stat-card">

                <span class="stat-icon">✨</span>

                <h3>Completed</h3>

                <div class="stat-number">
                    {{ $tasks->where('status', 'Completed')->count() }}
                </div>

            </div>

        </div>

    </div>


    <!-- MAIN TASK SECTION -->

    <div class="container">

        @if(session('success'))

            <div class="success">
                💕 {{ session('success') }}
            </div>

        @endif


        <div class="task-header">

            <h2>
                🌷 My Tasks
            </h2>

            <a href="/tasks/create" class="add-button">
                ＋ Add New Task
            </a>

        </div>


        <div class="task-card">

            @if($tasks->count() > 0)

                <table>

                    <thead>

                        <tr>

                            <th>Task</th>

                            <th>Description</th>

                            <th>Status</th>

                            <th>Due Date</th>

                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($tasks as $task)

                            <tr>

                                <td>
                                    <strong>
                                        {{ $task->task_name }}
                                    </strong>
                                </td>


                                <td>
                                    {{ $task->description }}
                                </td>


                                <td>

                                    @if($task->status === 'Pending')

                                        <span class="status pending">
                                            🌸 Pending
                                        </span>

                                    @else

                                        <span class="status completed">
                                            ✨ Completed
                                        </span>

                                    @endif

                                </td>


                                <td>
                                    {{ $task->due_date }}
                                </td>


                                <td>

                                    <div class="actions">

                                        <!-- EDIT -->

                                        <a
                                            href="/tasks/{{ $task->id }}/edit"
                                            class="edit-button"
                                        >
                                            ✏️ Edit
                                        </a>


                                        <!-- COMPLETE -->

                                        <form
                                            action="/tasks/{{ $task->id }}/status"
                                            method="POST"
                                        >

                                            @csrf

                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="complete-button"
                                            >
                                                {{ $task->status === 'Pending' ? '✓ Complete' : '↩ Pending' }}
                                            </button>

                                        </form>


                                        <!-- DELETE -->

                                        <form
                                            action="/tasks/{{ $task->id }}"
                                            method="POST"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="delete-button"
                                                onclick="return confirm('Are you sure you want to delete this task?')"
                                            >
                                                🗑 Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="empty">

                    <div class="empty-icon">
                        🌷
                    </div>

                    <h3>No tasks yet!</h3>

                    <p>
                        Add your first task and start organizing your day.
                    </p>

                </div>

            @endif

        </div>

    </div>

</body>
</html>
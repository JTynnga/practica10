<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoList</title>
    @vite('resources/css/app.css')
</head>

<body class="overflow-x-hidden">
    </div>
    <div class="w-screen h-[800px] flex justify-around items-center bg-[#343434]">
        <div class="border w-[400px] h-[400px] flex flex-col justify-center items-center bg-white rounded-lg">
            <form action="/api/create" method="POST" class="flex flex-col justify-around items-center h-full py-6">
                <label for="newTask" class=" font-semibold text-xl">Mantenimiento de tareas</label>
                <textarea class="border p-2 border-black w-[300px] h-[200px] my-4 rounded-lg" type="text" id="newTask"
                    name="newTask"></textarea>
                <div class="flex justify-between  w-full">
                    <button
                        class="bg-[#3d469a] hover:bg-[#39b089] py-2 px-4 rounded-lg text-[#2e9d71] hover:text-[#46f2ad] shadow-md hover:shadow-lg shadow-[#3a705e81] hover:shadow-[#85ffd6a7]"
                        type="submit"> Crear
                        tarea</button>
                    <button
                        class="bg-[#f64d86] hover:bg-[#8a2d4c] py-2 px-4 rounded-lg text-[#5f1e34] hover:text-[#ed6492] shadow-md hover:shadow-lg shadow-[#5f1e3481] hover:shadow-[#f189acce]"
                        type="reset"> Reset</button>
                </div>

            </form>
        </div>

        <div class=" bg-[#bfa6a9] w-[500px] h-[650px] px-16 pt-[73px]">
            <table class="w-full">
                <thead>
                    <tr>
                        <th colspan="4">Tareas Pendientes</th>
                    </tr>
                </thead><br>
                <tbody class="">
                    @foreach ($tasks as $task)
                        <tr class="flex justify-between w-full">
                            <form action="/api/update/{{ $task->id }}" method="POST">
                                <td>
                                    <button type="submit"
                                        class="bg-[#7385f9] hover:bg-[#2d8a3c]  rounded-full text-[#1e5f3b] hover:text-[#64ed64] shadow-md hover:shadow-lg shadow-[#1e5f2a81] hover:shadow-[#89f197ce]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                    </button>
                                </td>

                                <td>
                                    <p class="<?php
                                    if ($task->status == 2) {
                                        echo 'line-through';
                                    }
                                    ?>  w-56 truncate">{{ $task->task }}</p>
                                </td>
                                <td class="flex justify-center items-center">
                                    <?php
                                    if ($task->status == 1) {
                                        echo '<p class="text-[6px] bg-yellow-400 py-[2px] px-[4px] rounded-lg">In progress</p>';
                                    }
                                    if ($task->status == 2) {
                                        echo '<p class="text-[6px] bg-green-400 py-[2px] px-[4px] rounded-lg">Done</p>';
                                    }
                                    ?>
                                </td>
                            </form>
                            <td>
                                <form action="/api/delete/{{ $task->id }}" method="POST">
                                    <button type="submit"
                                        class="bg-[#f64d86] hover:bg-[#8a2d4c]  rounded-sm text-[#5f1e34] hover:text-[#ed6492] shadow-md hover:shadow-lg shadow-[#5f1e3481] hover:shadow-[#f189acce]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>




</body>
<!-- <div class=" bg-[url('/public/fig01.png')] bg-cover w-[500px] h-[650px] px-16 pt-[73px]"> -->

</html>

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task2;

class Tasks2Controller extends Controller
{
    public function index(Request $request)
    {
        $month = $request->query('month');
        $year = date('Y'); // You can change this to the desired year
        $daysInMonth = $month ? cal_days_in_month(CAL_GREGORIAN, $month, $year) : 31;

        if ($month) {
            $tasks = Task2::whereMonth('tgl_mulai_r', $month)
                ->orWhereMonth('tgl_mulai_p', $month)
                ->get();
        } else {
            $month = $request->input('month', date('n')); // Default to current month if no month is selected
            $tasks = Task2::whereMonth('tgl_mulai_r', $month)->get();
        }

        return view('tasks2', compact('tasks', 'daysInMonth'));
    }




    // Create new task
    public function create()
    {
        return view('tasks2.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'agenda' => 'required|string',
            'jenis_agenda' => 'required|string',
            'duration_plan' => 'required|integer',
            'duration_execute' => 'required|integer',
            'tgl_mulai_r' => 'required|date',
            'tgl_selesai_r' => 'required|date',
            'tgl_mulai_p' => 'required|date',
            'tgl_selesai_p' => 'required|date',
            'pengubah' => 'required|string',
            'alasan' => 'required|string'
        ]);

        $task = new Task2([
            'agenda' => $request->agenda,
            'jenis_agenda' => $request->jenis_agenda,
            'duration_plan' => $request->duration_plan,
            'duration_execute' => $request->duration_execute,
            'tgl_mulai_r' => $request->tgl_mulai_r,
            'tgl_selesai_r' => $request->tgl_selesai_r,
            'tgl_mulai_p' => $request->tgl_mulai_p,
            'tgl_selesai_p' => $request->tgl_selesai_p,
            'pengubah' => $request->pengubah,
            'alasan' => $request->alasan
        ]);

        $task->save();

        return redirect()->route('tasks2.index');
    }

    // Update existing task

    public function edit($id)
    {
        $task = Task2::find($id);
        if (!$task) {
            return redirect()->back()->with('error', 'Task tidak ditemukan.');
        }
        return view('edit_pkm', compact('task'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'agenda' => 'required|string',
            'jenis_agenda' => 'required|string',
            'duration_plan' => 'required|integer',
            'duration_execute' => 'required|integer',
            'tgl_mulai_r' => 'required|date',
            'tgl_selesai_r' => 'required|date',
            'tgl_mulai_p' => 'required|date',
            'tgl_selesai_p' => 'required|date',
            'pengubah' => 'required|string',
            'alasan' => 'required|string'
        ]);

        $task = Task2::find($id);
        if (!$task) {
            return redirect()->back()->with('error', 'Task tidak ditemukan.');
        }
        $task->agenda = $request->agenda;
        $task->jenis_agenda = $request->jenis_agenda;
        $task->duration_plan = $request->duration_plan;
        $task->duration_execute = $request->duration_execute;
        $task->tgl_mulai_r = $request->tgl_mulai_r;
        $task->tgl_selesai_r = $request->tgl_selesai_r;
        $task->tgl_mulai_p = $request->tgl_mulai_p;
        $task->tgl_selesai_p = $request->tgl_selesai_p;
        $task->pengubah = $request->pengubah;
        $task->alasan = $request->alasan;
        $task->save();

        return redirect()->route('tasks2.index')->with('success', 'Informasi berhasil diperbarui.');
    }
    // Delete task
    public function destroy(Task2 $task)
    {
        $task->delete();
        return redirect()->route('tasks2.index');
    }
}

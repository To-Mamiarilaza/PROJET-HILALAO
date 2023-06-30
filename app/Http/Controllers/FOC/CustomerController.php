<?php
namespace App\Http\Controllers\FOC;

use App\Models\FOC\GestionClient\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $users = Customer::getAll();

        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = Customer::findById($id);

        return view('users.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = Customer::findById($id);

        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $user = Customer::findById($id);
        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        $user = Customer::findById($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Customer deleted successfully.');
    }

    public function deconnect() {
        session()->flush();

        return View('FOC\login');
    }
}
?>
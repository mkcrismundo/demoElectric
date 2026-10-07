<?php

namespace App\Controllers;

use App\Models\CustomerAccount;

class Dashboard extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerAccount();
    }

    protected function requireLogin()
    {
        if (session()->get('isLogged') !== true) {
            return redirect()->to(base_url('login'));
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        return view('dashboard', [
            'title' => 'Dashboard - Puihaha Electric',
            'page' => 'dashboard',
            'customers' => $this->customerModel->orderBy('id', 'DESC')->findAll(),
            'success' => session()->getFlashdata('success'),
            'error' => session()->getFlashdata('error'),
        ]);
    }

    public function create()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        if ($this->request->getMethod() === 'POST') {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'account_number' => 'required|max_length[50]',
                'customer_name' => 'required|max_length[150]',
                'address' => 'required',
                'phone' => 'permit_empty|max_length[20]',
                'email' => 'permit_empty|valid_email|max_length[100]',
                'meter_number' => 'permit_empty|max_length[50]',
                'connection_type' => 'required|in_list[residential,commercial,industrial]',
                'status' => 'required|in_list[active,inactive,suspended]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('validation', $validation->getErrors());
            }

            $accountNumber = trim((string) $this->request->getPost('account_number'));

            if ($this->customerModel->where('account_number', $accountNumber)->first()) {
                return redirect()->back()->withInput()->with('validation', ['Account number already exists.']);
            }

            $data = [
                'account_number' => $accountNumber,
                'customer_name' => trim((string) $this->request->getPost('customer_name')),
                'address' => trim((string) $this->request->getPost('address')),
                'phone' => trim((string) $this->request->getPost('phone')) ?: null,
                'email' => trim((string) $this->request->getPost('email')) ?: null,
                'meter_number' => trim((string) $this->request->getPost('meter_number')) ?: null,
                'connection_type' => $this->request->getPost('connection_type'),
                'status' => $this->request->getPost('status'),
            ];

            if ($this->customerModel->insert($data)) {
                session()->setFlashdata('success', 'Customer account added successfully.');
                return redirect()->to(base_url('dashboard'));
            }

            session()->setFlashdata('error', 'Unable to add customer account.');
            return redirect()->back()->withInput();
        }

        return view('dashboard_form', [
            'title' => 'Add Customer Account - Puihaha Electric',
            'page' => 'dashboard',
            'customer' => null,
            'action' => 'create',
            'validation' => session()->getFlashdata('validation'),
        ]);
    }

    public function view($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $customer = $this->customerModel->find($id);

        if (!$customer) {
            session()->setFlashdata('error', 'Customer account not found.');
            return redirect()->to(base_url('dashboard'));
        }

        return view('dashboard_view', [
            'title' => 'View Customer Account - Puihaha Electric',
            'page' => 'dashboard',
            'customer' => $customer,
        ]);
    }

    public function edit($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $customer = $this->customerModel->find($id);

        if (!$customer) {
            session()->setFlashdata('error', 'Customer account not found.');
            return redirect()->to(base_url('dashboard'));
        }

        if ($this->request->getMethod() === 'POST') {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'account_number' => 'required|max_length[50]',
                'customer_name' => 'required|max_length[150]',
                'address' => 'required',
                'phone' => 'permit_empty|max_length[20]',
                'email' => 'permit_empty|valid_email|max_length[100]',
                'meter_number' => 'permit_empty|max_length[50]',
                'connection_type' => 'required|in_list[residential,commercial,industrial]',
                'status' => 'required|in_list[active,inactive,suspended]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('validation', $validation->getErrors());
            }

            $accountNumber = trim((string) $this->request->getPost('account_number'));

            $existing = $this->customerModel
                ->where('account_number', $accountNumber)
                ->where('id !=', $id)
                ->first();

            if ($existing) {
                return redirect()->back()->withInput()->with('validation', ['Account number already exists.']);
            }

            $data = [
                'account_number' => $accountNumber,
                'customer_name' => trim((string) $this->request->getPost('customer_name')),
                'address' => trim((string) $this->request->getPost('address')),
                'phone' => trim((string) $this->request->getPost('phone')) ?: null,
                'email' => trim((string) $this->request->getPost('email')) ?: null,
                'meter_number' => trim((string) $this->request->getPost('meter_number')) ?: null,
                'connection_type' => $this->request->getPost('connection_type'),
                'status' => $this->request->getPost('status'),
            ];

            if ($this->customerModel->update($id, $data)) {
                session()->setFlashdata('success', 'Customer account updated successfully.');
                return redirect()->to(base_url('dashboard'));
            }

            session()->setFlashdata('error', 'Unable to update customer account.');
            return redirect()->back()->withInput();
        }

        return view('dashboard_form', [
            'title' => 'Edit Customer Account - Puihaha Electric',
            'page' => 'dashboard',
            'customer' => $customer,
            'action' => 'edit',
            'validation' => session()->getFlashdata('validation'),
        ]);
    }

    public function delete($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        if ($this->customerModel->delete($id)) {
            session()->setFlashdata('success', 'Customer account deleted successfully.');
        } else {
            session()->setFlashdata('error', 'Unable to delete customer account.');
        }

        return redirect()->to(base_url('dashboard'));
    }
}
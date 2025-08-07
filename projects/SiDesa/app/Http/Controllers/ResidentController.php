<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResidentController extends Controller
{
    public $genders;
    public $marital_statuses;
    public $statuses;

    public function __construct()
    {
        $this->genders = [
            (object) [
                'label' => 'Pilih Jenis Kelamin',
                'value' => ''
            ],
            (object) [
                'label' => 'Laki-laki',
                'value' => 'male'
            ],
            (object) [
                'label' => 'Perempuan',
                'value' => 'female'
            ]
        ];

        $this->marital_statuses = [
            (object) [
                'label' => 'Pilih Status Perkawinan',
                'value' => ''
            ],
            (object) [
                'label' => 'Belum Menikah',
                'value' => 'single'
            ],
            (object) [
                'label' => 'Sudah Menikah',
                'value' => 'married'
            ],
            (object) [
                'label' => 'Bercerai',
                'value' => 'divorced'
            ],
            (object) [
                'label' => 'Janda / Duda',
                'value' => 'widowed'
            ]
        ];

        $this->statuses = [
            (object) [
                'label' => 'Pilih Status Kependudukan',
                'value' => ''
            ],
            (object) [
                'label' => 'Aktif',
                'value' => 'active'
            ],
            (object) [
                'label' => 'Pindah',
                'value' => 'moved'
            ],
            (object) [
                'label' => 'Wafat',
                'value' => 'deceased'
            ]
        ];
    }

    public function index()
    {
        $residents = Resident::with('user')->paginate(5);

        // dd($residents);

        return view('pages.resident.index', [
            'residents' => $residents
        ]);
    }

    public function create()
    {


        return view('pages.resident.create', [
            'genders' => $this->genders,
            'marital_statuses' => $this->marital_statuses,
            'statuses' => $this->statuses
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => ["required", "min:16", "max:16"],
            'name' => ["required", "max:100"],
            'gender' => ["required", Rule::in(['male', 'female'])],
            'birth_of_date' => ["required", "date"],
            'birth_of_place' => ["required", "max:100"],
            'address' => ["required", "max:700"],
            'religion' => ["nullable", "max:50"],
            'marital_status' => ["required", Rule::in(['single', 'married', 'divorced', 'widowed'])],
            'occupation' => ["nullable", "max:100"],
            'phone' => ["nullable", "max:15"],
            'status' => ["required", Rule::in(['active', 'moved', 'deceased'])],
        ]);

        Resident::create($validated);
        return redirect('/resident')->with('success', 'Berhasil menambahkan data');
    }

    public function edit(Resident $resident)
    {
        // $resident = Resident::findOrFail($resident);
        // dd($resident);

        return view('pages.resident.edit', [
            'resident' => $resident,
            'genders' => $this->genders,
            'marital_statuses' => $this->marital_statuses,
            'statuses' => $this->statuses
        ]);
    }

    public function update(Request $request, Resident $resident)
    {
        $validated = $request->validate([
            'nik' => ["required", "min:16", "max:16"],
            'name' => ["required", "max:100"],
            'gender' => ["required", Rule::in(['male', 'female'])],
            'birth_of_date' => ["required", "date"],
            'birth_of_place' => ["required", "max:100"],
            'address' => ["required", "max:700"],
            'religion' => ["nullable", "max:50"],
            'marital_status' => ["required", Rule::in(['single', 'married', 'divorced', 'widowed'])],
            'occupation' => ["nullable", "max:100"],
            'phone' => ["nullable", "max:15"],
            'status' => ["required", Rule::in(['active', 'moved', 'deceased'])],
        ]);
        $resident->update($validated);
        return redirect('/resident')->with('success', 'Berhasil mengubah data');
    }

    public function destroy(Resident $resident)
    {
        $resident->delete();

        return redirect('/resident')->with('success', 'Berhasil menghapus data');
    }
}

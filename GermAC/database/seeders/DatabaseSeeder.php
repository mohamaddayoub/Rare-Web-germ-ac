<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'doctor1',
            'email' => 'doctor1@gmail.com',
            'password' => '$2y$10$D2/taoEJoHXRU6nJPcjbVuRpKCZ8ak2DfHwILI2nGvAoiStimrgjS',
            'work' => 'Doctor'
        ]);
        \App\Models\Contact::factory()->create([
            'location' => 'Dubai World Trade Center-Sheikh Rashid Tower
            Floor number  4',
            'email' => 'Orwah79@yahoo.com',
            'call' => '  UAE           
            00971559610205
            00971026660826
              Germany     004915901386561
               KSA.             00966530604870',
        ]);

        \App\Models\section::factory()->create([
            'name' => 'Cardiology ',
            'description' => 'Cardiology is a medical specialty that focuses on the diagnosis, treatment, and prevention of diseases and conditions related to the heart and cardiovascular system. Cardiologists are physicians who specialize in this field and have advanced training and expertise in the diagnosis and management of heart disease.

            Cardiologists diagnose and treat a wide range of heart-related conditions, including coronary artery disease, heart failure, arrhythmias (irregular heartbeats), valvular heart disease, and congenital heart defects. They use a variety of diagnostic tools and tests, such as electrocardiograms (ECGs), echocardiograms, cardiac catheterization, and stress tests, to evaluate heart function and identify any abnormalities.',
        ]);
        // \App\Models\section::factory()->create([
        //     'name' => 'Neurology ',
        //     'description' => 'Cardiology is a medical specialty that focuses on the diagnosis, treatment, and prevention of diseases and conditions related to the heart and cardiovascular system. Cardiologists are physicians who specialize in this field and have advanced training and expertise in the diagnosis and management of heart disease.

        //     Cardiologists diagnose and treat a wide range of heart-related conditions, including coronary artery disease, heart failure, arrhythmias (irregular heartbeats), valvular heart disease, and congenital heart defects. They use a variety of diagnostic tools and tests, such as electrocardiograms (ECGs), echocardiograms, cardiac catheterization, and stress tests, to evaluate heart function and identify any abnormalities.',
        // ]);
        // \App\Models\section::factory()->create([
        //     'name' => 'Oncology ',
        //     'description' => 'Cardiology is a medical specialty that focuses on the diagnosis, treatment, and prevention of diseases and conditions related to the heart and cardiovascular system. Cardiologists are physicians who specialize in this field and have advanced training and expertise in the diagnosis and management of heart disease.

        //     Cardiologists diagnose and treat a wide range of heart-related conditions, including coronary artery disease, heart failure, arrhythmias (irregular heartbeats), valvular heart disease, and congenital heart defects. They use a variety of diagnostic tools and tests, such as electrocardiograms (ECGs), echocardiograms, cardiac catheterization, and stress tests, to evaluate heart function and identify any abnormalities.',
        // ]);
        \App\Models\Course::factory()->create([
            'section_id' => 1,
            'name' => 'Course 1 ',
            'price' => '2000 ',
            'currency' => 'aed',
            'description' => 'A medical course in the field of cardiology typically covers topics related to the heart and cardiovascular system, including anatomy, physiology, diseases, and treatments. The course may be designed for medical students, residents, fellows, or practicing physicians who want to deepen their knowledge in this specialty.

        //     The course may cover a range of topics',
            'date' => now(),
            'time' => now(),
            'rate' => '4.5',
        ]);


        // $this->call(SectionSeeder::class);

        // $this->call(CourseSeeder::class);
        // $this->call(DoctorSeeder::class);
        // $this->call(VoyagerDatabaseSeeder::class);

        \App\Models\Doctor::factory()->create([
            'section_id' => 1,
             'name' => 'doctor1',
             'email' => 'doctor1@gmail.com',
            'description' => 'Cardiology is a medical specialty that focuses on the diagnosis, treatment, and prevention of diseases and conditions related to the heart and cardiovascular system. Cardiologists are physicians who specialize in this field and have advanced training and expertise in the diagnosis and management of heart disease.

            Cardiologists diagnose and treat a wide range of heart-related conditions.',
            'image'=> '...',
            'specialization' => '',
            'rate' => '4.5',


        ]);
        \App\Models\Appointment::factory()->create([
        // 'user_id'=>1,
        'doctor_id'=>1 ,
        'appointment_time' => "2023-09-19 17:18:00",
        ]);
    }

}

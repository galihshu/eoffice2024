<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $readUsers   = Permission::create(['name' => 'read-users', 'guard_name' => 'web']);
        $addUsers    = Permission::create(['name' => 'add-users', 'guard_name' => 'web']);
        $updateUsers = Permission::create(['name' => 'update-users', 'guard_name' => 'web']);
        $deleteUsers = Permission::create(['name' => 'delete-users', 'guard_name' => 'web']);
        $register    = Permission::create(['name' => 'register-users', 'guard_name' => 'web']);

        $readRoles   = Permission::create(['name' => 'read-roles', 'guard_name' => 'web']);
        $addRoles    = Permission::create(['name' => 'add-roles', 'guard_name' => 'web']);
        $updateRoles = Permission::create(['name' => 'update-roles', 'guard_name' => 'web']);
        $deleteRoles = Permission::create(['name' => 'delete-roles', 'guard_name' => 'web']);

        $readPermissions   = Permission::create(['name' => 'read-permissions', 'guard_name' => 'web']);
        $addPermissions    = Permission::create(['name' => 'add-permissions', 'guard_name' => 'web']);
        $updatePermissions = Permission::create(['name' => 'update-permissions', 'guard_name' => 'web']);
        $deletePermissions = Permission::create(['name' => 'delete-permissions', 'guard_name' => 'web']);

        $readJenisSurat   = Permission::create(['name' => 'read-jenis-surat', 'guard_name' => 'web']);
        $addJenisSurat    = Permission::create(['name' => 'add-jenis-surat', 'guard_name' => 'web']);
        $updateJenisSurat = Permission::create(['name' => 'update-jenis-surat', 'guard_name' => 'web']);
        $deleteJenisSurat = Permission::create(['name' => 'delete-jenis-surat', 'guard_name' => 'web']);

        $readJabatan   = Permission::create(['name' => 'read-jabatan', 'guard_name' => 'web']);
        $addJabatan    = Permission::create(['name' => 'add-jabatan', 'guard_name' => 'web']);
        $updateJabatan = Permission::create(['name' => 'update-jabatan', 'guard_name' => 'web']);
        $deleteJabatan = Permission::create(['name' => 'delete-jabatan', 'guard_name' => 'web']);

        $readSuratMasuk   = Permission::create(['name' => 'read-surat-masuk', 'guard_name' => 'web']);
        $addSuratMasuk    = Permission::create(['name' => 'add-surat-masuk', 'guard_name' => 'web']);
        $updateSuratMasuk = Permission::create(['name' => 'update-surat-masuk', 'guard_name' => 'web']);
        $deleteSuratMasuk = Permission::create(['name' => 'delete-surat-masuk', 'guard_name' => 'web']);
        $gantiStatusSuratMasuk = Permission::create(['name' => 'ganti-status-surat', 'guard_name' => 'web']);

        $readSuratKeluar   = Permission::create(['name' => 'read-surat-keluar', 'guard_name' => 'web']);
        $addSuratKeluar    = Permission::create(['name' => 'add-surat-keluar', 'guard_name' => 'web']);
        $updateSuratKeluar = Permission::create(['name' => 'update-surat-keluar', 'guard_name' => 'web']);
        $deleteSuratKeluar = Permission::create(['name' => 'delete-surat-keluar', 'guard_name' => 'web']);

        $readDisposisi   = Permission::create(['name' => 'read-disposisi', 'guard_name' => 'web']);
        $addDisposisi    = Permission::create(['name' => 'add-disposisi', 'guard_name' => 'web']);
        $updateDisposisi = Permission::create(['name' => 'update-disposisi', 'guard_name' => 'web']);
        $deleteDisposisi = Permission::create(['name' => 'delete-disposisi', 'guard_name' => 'web']);
        $teruskanDisposisi = Permission::create(['name' => 'teruskan-disposisi', 'guard_name' => 'web']);

        $readDistribusi   = Permission::create(['name' => 'read-distribusi', 'guard_name' => 'web']);
        $addDistribusi    = Permission::create(['name' => 'add-distribusi', 'guard_name' => 'web']);
        $updateDistribusi = Permission::create(['name' => 'update-distribusi', 'guard_name' => 'web']);
        $deleteDistribusi = Permission::create(['name' => 'delete-distribusi', 'guard_name' => 'web']);
        
        $tolakSuratMasuk = Permission::create(['name' => 'tolak-surat-masuk', 'guard_name' => 'web']);
        $selesaiSuratMasuk = Permission::create(['name' => 'selesai-surat-masuk', 'guard_name' => 'web']);

        $readLaporanSuratMasuk   = Permission::create(['name' => 'read-laporan-surat-masuk', 'guard_name' => 'web']);
        $readLaporanSuratKeluar   = Permission::create(['name' => 'read-laporan-surat-keluar', 'guard_name' => 'web']);
        $readMonitoringDisposisi   = Permission::create(['name' => 'read-monitoring-disposisi', 'guard_name' => 'web']);

        // $readFilemanager   = Permission::create(['name' => 'read-file-manager']);
        // $addFilemanager    = Permission::create(['name' => 'add-file-manager']);
        // $updateFilemanager = Permission::create(['name' => 'update-file-manager']);
        // $deleteFilemanager = Permission::create(['name' => 'delete-file-manager']);

        // $readSuperadmin       = Permission::create(['name' => 'read-super-admin']);
        // $addSuperadmin        = Permission::create(['name' => 'add-super-admin']);
        // $updateSuperadmin     = Permission::create(['name' => 'update-super-admin']);
        // $deleteSuperadmin     = Permission::create(['name' => 'delete-super-admin']);
        // $editPostSuperadmin   = Permission::create(['name' => 'edit-post-super-admin']);
        // $deletePostSuperadmin = Permission::create(['name' => 'delete-post-super-admin']);

        $readAdmin       = Permission::create(['name' => 'read-admin', 'guard_name' => 'web']);
        $addAdmin        = Permission::create(['name' => 'add-admin', 'guard_name' => 'web']);
        $updateAdmin     = Permission::create(['name' => 'update-admin', 'guard_name' => 'web']);
        $deleteAdmin     = Permission::create(['name' => 'delete-admin', 'guard_name' => 'web']);

        $readOperator       = Permission::create(['name' => 'read-operator', 'guard_name' => 'web']);
        $addOperator        = Permission::create(['name' => 'add-operator', 'guard_name' => 'web']);
        $updateOperator     = Permission::create(['name' => 'update-operator', 'guard_name' => 'web']);
        $deleteOperator     = Permission::create(['name' => 'delete-operator', 'guard_name' => 'web']);

        $readSettings   = Permission::create(['name' => 'read-settings', 'guard_name' => 'web']);
        $updateSettings = Permission::create(['name' => 'update-settings', 'guard_name' => 'web']);

        $readProfile   = Permission::create(['name' => 'read-profile', 'guard_name' => 'web']);
        $updateProfile = Permission::create(['name' => 'update-profile', 'guard_name' => 'web']);

        // Role
        // Role::create(['name' => 'admin', 'guard_name' => 'web'])->givePermissionTo(Permission::all());
        
        // Buat role admin
        $role = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        // Ambil semua permissions kecuali 'teruskan-disposisi'
        $permissions = Permission::where('name', '!=', 'teruskan-disposisi')->get();
        // Berikan permissions ke role admin
        $role->givePermissionTo($permissions);

        Role::create(['name' => 'operator', 'guard_name' => 'web'])->givePermissionTo([
            $readSuratMasuk, $addSuratMasuk, $updateSuratMasuk, $deleteSuratMasuk,
            $readDistribusi, $addDistribusi, $updateDistribusi, $deleteDistribusi,
            $selesaiSuratMasuk,
            $readSuratKeluar, $addSuratKeluar, $updateSuratKeluar, $deleteSuratKeluar,            
            $readLaporanSuratMasuk, $readLaporanSuratKeluar, $readMonitoringDisposisi,
            $readProfile, $updateProfile,
        ]);

        Role::create(['name' => 'pemberidisposisi', 'guard_name' => 'web'])->givePermissionTo([
            $readSuratMasuk, $addSuratMasuk, $updateSuratMasuk, $deleteSuratMasuk, $gantiStatusSuratMasuk,
            $readSuratKeluar,
            $tolakSuratMasuk,
            $readDisposisi, $addDisposisi, $updateDisposisi, $deleteDisposisi,
            $readLaporanSuratMasuk, $readLaporanSuratKeluar, $readMonitoringDisposisi,
            $updateUsers,
            $readProfile, $updateProfile,
        ]);

        Role::create(['name' => 'penanggungjawab', 'guard_name' => 'web'])->givePermissionTo([
            $readSuratMasuk,
            $readDisposisi, $updateDisposisi, $deleteDisposisi,
            $teruskanDisposisi,
            $readLaporanSuratMasuk, $readMonitoringDisposisi,
            $updateUsers,
            $readProfile, $updateProfile,
        ]);

        Role::create(['name' => 'pelaksana', 'guard_name' => 'web'])->givePermissionTo([
            $readSuratMasuk,
            $readDisposisi,
            $readLaporanSuratMasuk, $readMonitoringDisposisi,
            $updateUsers,
            $readProfile, $updateProfile,
        ]);
    }
}

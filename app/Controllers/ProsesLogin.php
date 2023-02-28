<?php

namespace App\Controllers;


class ProsesLogin extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('auth_groups.id as idRole');
        $builder->join('auth_groups_users', 'users.id = auth_groups_users.user_id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', user_id());
        $query = $builder->get();

        $data['user'] = $query->getResult();
        foreach ($data['user'] as $dPengguna) :
            $idRole = $dPengguna->idRole;
        endforeach;

        if ($idRole == 1) {
            return redirect()->to('calonsiswa');
        } elseif ($idRole == 2) {
            echo "Ini Admin PMB";
        } elseif ($idRole == 3) {
            return redirect()->to('adminWeb');
        } elseif ($idRole == 4) {
            return redirect()->to('kurikulum');
        } elseif ($idRole == 5) {
            return redirect()->to('kesiswaan');
        } elseif ($idRole == 6) {
            return redirect()->to('tatausaha');
        } elseif ($idRole == 7) {
            return redirect()->to('keuangan');
        }
    }
}

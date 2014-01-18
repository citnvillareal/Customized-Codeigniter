<?php

$config['sign_up'] = array(
                            array(
                                    'field' => 'first_name',
                                    'label' => 'First Name',
                                    'rules' => 'required'
                            ),
                            array(
                                    'field' => 'last_name',
                                    'label' => 'Last Name',
                                    'rules' => 'required'
                            ),
                            array(
                                    'field' => 'username',
                                    'label' => 'Username',
                                    'rules' => 'required|min_length[6]|is_unique[accounts.username]'
                            ),
                            array(
                                    'field' => 'password',
                                    'label' => 'Password',
                                    'rules' => 'required|min_length[6]'
                            )
                    );

$config['login'] = array(
                            array(
                                    'field' => 'username',
                                    'label' => 'Username',
                                    'rules' => 'required|min_length[6]'
                            ),
                            array(
                                    'field' => 'password',
                                    'label' => 'Password',
                                    'rules' => 'required|min_length[6]'
                            )
                    );
?>

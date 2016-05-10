<?php

return array(
    'db' => array(
        'table' => 'comments',
        'order' => array(
            'created_at' => 'desc',
        ),
        'pagination' => array(
            'per_page' => 20,
            'uri' => '/admin/comments',
        ),
    ),

    'options' => array(
        'caption' => 'Комментарии',
        'ident' => 'comments',
        'form_ident' => 'comments-form',
        'form_width' => '920px',
        'table_ident' => 'comments-table',
        'action_url' => '/admin/handle/comments',
        'not_found' => 'пусто',
        'is_sortable' => false,
        'model' => 'Vis\Comments\Comment',
        'handler'    => 'Vis\Builder\Helpers\CommentsHandler',
    ),
    'position' => array(
        'tabs' => array(
            'Общая' => array(
                'id',
                'name',
                'message',
                'commentpage_id',
                'commentpage_type',
                'user_id',
                'record',
                'created_at',
                'updated_at',
            ),
        )
    ),
    'fields' => array(
        'id' => array(
            'caption' => '#',
            'type' => 'readonly',
            'class' => 'col-id',
            'width' => '1%',
            'hide' => true,
            'is_sorting' => false
        ),

        'name' => array(
            'caption' => 'Имя',
            'type' => 'text',
            'filter' => 'text',
            'is_sorting' => true,
            'field' => 'string',
        ),
        'message' => array(
            'caption' => 'Комментарий',
            'type'    => 'textarea',
            'field' => 'text',
        ),
        'record' => array(
            'caption' => 'Статья',
            'type' => 'text',
            'filter' => 'text',
            'is_sorting' => true,
        ),
        'created_at' => array(
            'caption' => 'Дата создания',
            'type' => 'datetime',
            'is_sorting' => true,
            'months' => 2,
            'field' => 'timestamp',
        ),
        'updated_at' => array(
            'caption' => 'Дата обновления',
            'type' => 'readonly',
            'hide_list' => true,
            'is_sorting' => true,
            'hide'        => true,
            'field' => 'timestamp',
        ),
        'commentpage_id' => array(
            'caption' => 'id записи',
            'type' => 'readonly',
            'hide_list' => true,
            'is_sorting' => true,
            'hide'        => true,
        ),
        'commentpage_type' => array(
            'caption' => 'Модель',
            'type' => 'readonly',
            'hide_list' => true,
            'is_sorting' => true,
            'hide'        => true,
        ),
        'user_id' => array(
            'caption' => 'ID user',
            'type' => 'readonly',
            'hide_list' => true,
            'is_sorting' => true,
            'hide'        => true,
        ),


    ),
    'filters' => array(
    ),
    'actions' => array(
        /* 'search' => array(
             'caption' => 'Поиск',
         ),*/

        'update' => array(
            'caption' => 'Редактировать',
            'check' => function() {
                return true;
            }
        ),
        'delete' => array(
            'caption' => 'Удалить',
            'check' => function() {
                return true;
            }
        ),
    ),
);
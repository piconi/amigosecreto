<?php
use Migrations\AbstractMigration;

class CreateInvitation extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('invitation');
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('group_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('checked', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ])
        ->addIndex(
            [
                'user_id',
            ]
        )
        ->addForeignKey(
            'user_id',
            'users',
            'id',
            [
                'update' => 'CASCADE',
                'delete' => 'RESTRICT'
            ]
        )
        ->addIndex(
            [
                'group_id',
            ]
        )
         ->addForeignKey(
            'group_id',
            'groups',
            'id',
            [
                'update' => 'CASCADE',
                'delete' => 'RESTRICT'
            ]
        );
        $table->create();
    }
}

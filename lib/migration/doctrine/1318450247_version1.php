<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version1 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('bill', 'is_paperless', 'boolean', '25', array(
             'default' => '0',
             'notnull' => '1',
             ));
    }

    public function down()
    {
        $this->removeColumn('bill', 'is_paperless');
    }
}
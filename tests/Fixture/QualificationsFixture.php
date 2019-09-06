<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QualificationsFixture
 *
 */
class QualificationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'candidate_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'degree_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'degree_level' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'expected_graduation_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'gpa' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'major' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'institution' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['candidate_id'], 'length' => []],
            'qualifications_pk_2' => ['type' => 'unique', 'columns' => ['degree_name'], 'length' => []],
            'qualifications_pk_3' => ['type' => 'unique', 'columns' => ['expected_graduation_date'], 'length' => []],
            'qualifications_pk' => ['type' => 'unique', 'columns' => ['degree_level'], 'length' => []],
            'qualifications_candidate_id_fk' => ['type' => 'foreign', 'columns' => ['candidate_id'], 'references' => ['candidates', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'candidate_id' => 1,
            'degree_name' => 'Lorem ipsum dolor sit amet',
            'degree_level' => 'Lorem ipsum dolor sit amet',
            'expected_graduation_date' => '2019-08-01',
            'gpa' => 'Lorem ip',
            'major' => 'Lorem ipsum dolor sit amet',
            'institution' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}

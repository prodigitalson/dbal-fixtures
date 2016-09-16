<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
namespace ComPHPPuebla\DBAL\Fixture\Persister;

use Xpmock\TestCase;

class ForeignKeyParserTest extends TestCase
{
    protected $reviews;

    protected function setUp()
    {
        $this->reviews = [
            'reviews' => [
                'review_1' => [
                    'comment' => 'El servicio es excelente',
                    'stars' => 5,
                    'station_id' => '@station_1',
                ],
            ],
        ];
    }

    public function testCanParseForeign()
    {
        $parser = new ForeignKeyParser();

        $parser->addReference('station_1', 1);
        $parsedValues = $parser->parse($this->reviews['reviews']['review_1']);

        $this->assertEquals(1, $parsedValues['station_id']);
    }
}
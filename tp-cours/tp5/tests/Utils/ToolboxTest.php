<?php

namespace App\Tests\Utils;

use App\Utils\Toolbox;
use PHPUnit\Framework\TestCase;

class ToolboxTest extends TestCase
{
    public function testCountWordsBasic()
    {
        $toolbox = new Toolbox();
        $text = 'Sit aliquam eum aliquam saepe sunt exercitationem';

        $this->assertEquals(7, $toolbox->countWords($text));
    }

    public function testCountWordsComplex()
    {
        $toolbox = new Toolbox();
        $text = 'Salut l\'ami, vous
        avez          une b3lle mine !';

        $this->assertEquals(8, $toolbox->countWords($text));
    }

    public function testCountLinksBasic()
    {
        $toolbox = new Toolbox();
        $text = 'Sit aliquam eum aliquam saepe sunt <a href="#">exercitationem</a>';

        $this->assertEquals(1, $toolbox->countsLinks($text));
    }

    public function testCountLinksEmpty()
    {
        $toolbox = new Toolbox();
        $text = 'Sit aliquam eum aliquam saepe sunt exercitationem';

        $this->assertEquals(0, $toolbox->countsLinks($text));
    }

    public function testCountLinksInvalid()
    {
        $toolbox = new Toolbox();
        $text = 'Sit aliquam eum aliquam <a>saepe</a> sunt exercitationem';

        $this->assertEquals(0, $toolbox->countsLinks($text));
    }

    public function testCountLinksComplex()
    {
        $toolbox = new Toolbox();
        $text = 'Mon lien valide <a href="" class="coucou" style="color: #154541">coucou</a> jfkdjfk djfd.
        Invalide <a href="jkjkjk"></a>
        Valide <a id="15" href="" class="coucou" style="color: #154541">coucou</a>';

        $this->assertEquals(2, $toolbox->countsLinks($text));
    }
}

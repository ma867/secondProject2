<?php
/**
 * Created by PhpStorm.
 * User: MAlzate
 * Date: 2/26/2019
 * Time: 7:30 PM
 */



use PHPUnit\Framework\TestCase;

final class AlbumTest extends TestCase
{
    public function testAlbumHasArtist()
    {
        $this->assertClassHasAttribute('artist', Album::class);
    }
    public function testAlbumHasTitle()
    {
        $this->assertClassHasAttribute('title', Album::class);
    }
    public function testAlbumHasYear()
    {
        $this->assertClassHasAttribute('year', Album::class);
    }
    public function testAlbumHasTotalSongs()
    {
        $this->assertClassHasAttribute('totalsongs', Album::class);
    }
    public function testAlbumHasGenre()
    {
        $this->assertClassHasAttribute('genre', Album::class);
    }
    public function testAlbumHasGoodRating()
    {
        $this->assertTrue(
            method_exists(Album::class, 'goodRating')
        );
    }

    public function testAlbumHasBadRating()
    {
        $this->assertTrue(
            method_exists(Album::class, 'badRating')
        );
    }
}

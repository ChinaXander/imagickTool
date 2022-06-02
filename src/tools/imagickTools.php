<?php

namespace tools;

use Imagick;

/**
 * User: xds
 * Date: 20220602
 * explain:
 */
class imagickTools
{
    private imagick $im;
    private string $pdf;                 //要处理的pdf
    private string $path = './testPdfToImg/';//图片存放路径
    private string $filename;            //图片名称（自动加上页码后缀，格式为 $filename-页码）
    private string $sub = 'png';         //图片后缀
    private array $pages;
    private array $imageData;

    public function __construct( $pdf )
    {
        if ( !extension_loaded( 'imagick' ) ) throw new \Exception( '未加载imagick扩展' );

        if ( !$pdf ) throw new \Exception( "pdf[$pdf] not null" );

        $this->pdf = $pdf;
        $this->im = new imagick();
        $this->im->setResolution( 100, 100 );
        $this->im->setCompressionQuality( 100 );
        $this->filename = md5( uniqid() . rand( 100, 999 ) );

    }

    /**
     * User: xds
     * Date: 20220602
     * explain: 设置图片存放路径
     * @param $path
     * @return void
     */
    public function setPath( $path )
    {
        if ( !is_dir( $path ) ) mkdir( $path );
        $this->path = $path;
    }


    public function setSub( $sub )
    {
        $this->sub = $sub;
    }


    public function setFilename( $filename )
    {
        $this->filename = $filename;
    }


    public function getIm(): Imagick
    {
        return $this->im;
    }

    /**
     * User: xds
     * Date: 20220602
     * explain:
     * @param int $page 页码 -1 全部  其他-指定页码
     * @param int $num  页数 0-不限制
     * @return $this
     * @throws \ImagickException
     */
    public function toImg( int $page = -1, int $num = 0 ): self
    {
        if ( $num > 0 )
        {
            $page = max( $page, 0 );
            for ( $i = $page; $i < $num + $page; $i++ )
            {
                try
                {
                    $this->pages[] = $i;
                    $this->im->readImage( "$this->pdf[$i]" );
                } catch ( \Exception $e )
                {
                    var_dump( "$this->pdf[$i]", $e->getMessage() );
                }
            }
        }
        else
        {
            $this->im->readImage( $this->pdf . ( $page > -1 ? "[$page]" : '' ) );
        }

        $this->setPath($this->path);

        foreach ( $this->im as $Key => $Var )
        {
            $Var->setImageFormat( $this->sub );

            $filename = $this->path . $this->filename . '-' . ( $this->pages[ $Key ] ?? ( $page > -1 ? $page : $Key ) ) . '.' . $this->sub;

            if ( $Var->writeImage( $filename ) )
            {
                $this->imageData[] = $filename;
            }
        }

        return $this;
    }

    public function getImageData(): array
    {
        return $this->imageData;
    }
}
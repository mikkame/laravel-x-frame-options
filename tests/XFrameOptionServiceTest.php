<?php namespace Tecpresso\XFrameOption;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Http\Kernel;

use Tecpresso\XFrameOption\XFrameOptionServiceProvider;
use Tecpresso\XFrameOption\Middleware\XFrameOption;

class XFrameOptionServiceTest extends \Orchestra\Testbench\TestCase
{
    protected $middleware;

    public function setUp()
    {
        parent::setUp();
        $this->middleware = new XFrameOption();
        config()->set('x-frame-options.sameorigin', ['/sameorigin']);
        config()->set('x-frame-options.allow', ['/allow']);
    }

    /**
     * Load the package
     * @return array the packages
     */
    protected function getPackageProviders($app)
    {
        return [
            \Tecpresso\XFrameOption\XFrameOptionServiceProvider::class
        ];
    }

    /** @test */
    public function test_middlewarer_registerd()
    {
        $this->assertTrue($this->app[Kernel::class]->hasMiddleware(XFrameOption::class));
    }

    /** @test */
    public function test_response_has_x_frame_options_header_deny()
    {
        $result = $this->get('/deny');
        $this->assertEquals('DENY', $result->headers->get('X-Frame-Options'));
    }

    /** @test */
    public function test_response_has_x_frame_options_header_sameorigin()
    {
        $result = $this->get('/sameorigin');
        $this->assertEquals('SAMEORIGIN', $result->headers->get('X-Frame-Options'));
    }

    /** @test */
    public function test_response_has_not_x_frame_options_header()
    {
        $result = $this->get('/allow');
        $this->assertEquals('', $result->headers->get('X-Frame-Options'));
    }
}

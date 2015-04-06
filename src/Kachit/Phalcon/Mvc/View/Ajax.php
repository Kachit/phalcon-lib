<?php
/**
 * View for ajax requests
 *
 * @author Kachit
 * @package Kachit\Phalcon\Mvc\View
 */
namespace Kachit\Phalcon\Mvc\View;

use Phalcon\Mvc\View;
use Phalcon\Cache\BackendInterface;
use Phalcon\Mvc\View\EngineInterface;
use Phalcon\Events\ManagerInterface;

class Ajax extends View {

    /**
     * @var string
     */
    protected $currentEngine = 'json';

    /**
     * Set current engine
     *
     * @param $currentEngine
     * @return $this
     */
    public function setCurrentEngine($currentEngine) {
        $this->currentEngine = $currentEngine;
        return $this;
    }

    /**
     * Checks whether view exists on registered extensions and render it
     *
     * @param $engines
     * @param $viewPath
     * @param $silence
     * @param $mustClean
     * @param BackendInterface $cache
     * @return null
     */
    protected function _engineRender($engines, $viewPath, $silence, $mustClean, $cache = null) {
        $viewParams = $this->_viewParams;
        /* @var ManagerInterface $eventsManager */
        $eventsManager = $this->_eventsManager;

        if (is_object($cache)) {
            if ($cache->isStarted() == false) {
                $key = null;
                $lifetime = null;
                $viewOptions = $this->_options;
                if (is_array($viewOptions)) {
                    if (isset($viewOptions['cache'])) {
                        $cacheOptions = $viewOptions['cache'];
                        if (is_array($cacheOptions)) {
                            if (isset($cacheOptions['key'])) {
                                $key = $cacheOptions['key'];
                            }
                            if (isset($cacheOptions['lifetime'])) {
                                $lifetime = $cacheOptions['lifetime'];
                            }
                        }
                    }
                }
                if ($key === null) {
                    $key = md5($viewPath);
                }
                $cachedView = $cache->start($key, $lifetime);
                if ($cachedView !== null) {
                    $this->data = $cachedView;
                    return null;
                }
            }
            if (!$cache->isFresh()) {
                return null;
            }
        }

        /* @var EngineInterface $engine*/
        foreach ($engines as $extension => $engine) {
            if ($extension == $this->currentEngine) {
                if (is_object($eventsManager)) {
                    if ($eventsManager->fire('view:beforeRenderView', $this) === false) {
                        continue;
                    }
                }

                $engine->render(null, $viewParams, $mustClean);

                if (is_object($eventsManager)) {
                    $eventsManager->fire('view:afterRenderView', $this);
                }
                break;
            }
        }
    }
}
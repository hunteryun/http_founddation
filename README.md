#用法：
======================

在你需要用到的Controller里加上

```
use Symfony\Component\HttpFoundation\Request;

/**
 * @var request
 */
public $request;

/**
 * Construct.
 */
public function __construct(Request $request) {
    $this->request = $request;
}

```

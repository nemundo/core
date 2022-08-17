<?phpnamespace Nemundo\Core\Repository;use Nemundo\Core\Base\AbstractBaseClass;abstract class AbstractRepository extends AbstractBaseClass{    /**     * @var string     */    public $project;    /**     * @var string     */    public $projectName;    /**     * @var string     */    public $namespace;    /**     * @var string     */    public $path;    public $gitRepositoryUrl;    /**     * @var AbstractRepository[]     */    private $dependencyList = [];    /**     * @var string[]     */    private $composerLibraryList = [];    abstract protected function loadProject();    public function __construct()    {        $this->loadProject();    }    protected function addDependency(AbstractRepository $project)    {        $this->dependencyList[] = $project;        return $this;    }    public function getDependencyList()    {        /** @var AbstractRepository[] $projectList */        $projectList = [];        $projectList[$this->namespace] = $this;        foreach ($this->dependencyList as $project) {            if (!(array_key_exists($project->namespace, $projectList))) {                $projectList[$project->namespace] = $project;            }            foreach ($project->getDependencyList() as $dependency) {                if (!(array_key_exists($dependency->namespace, $projectList))) {                    $projectList[$dependency->namespace] = $dependency;                }            }        }        return array_values($projectList);    }    public function addComposer($library)    {        $this->composerLibraryList[] = $library;        return $this;    }    public function getComposerList()    {        return $this->composerLibraryList;    }}
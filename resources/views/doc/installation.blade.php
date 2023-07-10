<!DOCTYPE html>
<html lang="zh">
@include('layout.head')

<body>
@include('layout.nav')

<div class="d-flex">
    @include('layout.sidebar')

    <div class="shadow-lg  p-10 m-2 documentation is-dark" :class="{'expanded': ! sidebar}">
        <div class="row">

            <div class="col-11">
                <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                    <div id="item-1">
                        <h2 class="blog-post-title mb-1">Installation</h2>
                        <div class="alert alert-success" role="alert">
                            To benefit a broad audience, we made TMKit available from multiple sources,
                            which can be installed via
                            <a href="https://pypi.org/" target="_blank"
                               class="stretched-link text-secondary" style="position: relative;">
                                PyPI
                            </a>,
{{--                            , <a href="https://docs.conda.io/en/latest/" target="_blank"--}}
{{--                                     class="stretched-link text-secondary" style="position: relative;">--}}
{{--                                Conda--}}
{{--                            </a>--}}
                            <a href="https://github.com/" target="_blank"
                                     class="stretched-link text-secondary" style="position: relative;">
                                GitHub</a>
                            , and <a href="https://www.docker.com/" target="_blank"
                                               class="stretched-link text-secondary" style="position: relative;">
                                Docker</a>.
                            Among them, we highly recommend installing it using PyPI, considering
                            the time and the number of steps that users will spend on making it available
                            to use.

                            <br><br>
                            In principle, TMKit can be built on any version of Python. However, considering that
                            NumPy and Pandas that are dependent libraries of TMKit have experienced a significant
                            revision in their respective latest versions and there are some potential conflicts
                            between Python versions and themselves, we suggest you to install TMKit on
                            Python versions of above 3.8, especially, Python 3.11. We have tested TMKit
                            running on Python v3.10 and v3.11.
                        </div>
                    </div>

                    <div id="item-1-1">
                        <h2>1. Via PyPI</h2>
                        <div class="alert alert-secondary" role="alert">
                            We highly recommend installing TMKit in a conda environment with a specific Python
                            version built. This allows you to manage other packages via both PyPI and Conda
                            after then. To achieve this purpose, it needs a couple of procedures below.
                            We recommend using <strong>TMKit</strong> version <span class="badge text-bg-warning">
                                <strong>0.0.3</strong>
                            </span>.
                        </div>
                        <pre><code class="language-python"># create a conda environment
conda create --name tmkit python=3.11.4
# You can also simply omit ".4" to make it like "python=3.11", which will allow conda to choose the most recent version for you.
# We do not really suggest using version Python versions. If you do stick to a Python version, please make sure
# it is above 3.8.
# the tmkit name in "--name tmkit" can be altered to your preferred environment name.

# activate the conda environment
conda activate tmkit

# do the following command, stable versions: 0.0.2 and 0.0.3 (recommended)
pip install tmkit==0.0.3</code></pre>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Via Github (for the latest version)</h2>
                        <div class="alert alert-secondary" role="alert">
                            The latest version of TMKit may differ to it in PyPI and it is based at GitHub.
                            Similarly, we highly recommend installing TMKit in a conda environment with a specific Python
                            version built. You are able to use the latest version after doing the following procedures.
                        </div>
                        <pre><code class="language-python"># create a conda environment
conda create --name tmkit python=3.11.4

# activate the conda environment
conda activate tmkit

# create a folder
mkdir project

# go to the folder
cd project

# fetch TMKit repository with the latest version
git clone https://github.com/2003100127/tmkit.git

# enter this repository
cd tmkit

# do the following command
pip install .
# or
python setup.py install</code></pre>
                    </div>

                    <div id="item-1-3">
                        <h2>3. Via Docker</h2>
                        <div class="alert alert-secondary" role="alert">
                            To ensure a successful use of TMKit in its stable version, we make it accessible in a Docker
                            image. Once being correctly configured, the Docker image will allow you to use TMKit
                            without installation.

                            <br><br>
                            You can first choose which type of operating system (OS) you would like to install Docker software.
                            Please refer to
                            <a href="https://docs.docker.com/engine/install" target="_blank"
                               class="stretched-link text-secondary" style="position: relative;">
                                https://docs.docker.com/engine/install</a>.
                            For example, if your computational work is based on a Windows OS, you can choose to
                            install a Desktop version of Docker. Please refer to
                            <a href="https://docs.docker.com/desktop/install/windows-install" target="_blank"
                               class="stretched-link text-secondary" style="position: relative;">
                                https://docs.docker.com/desktop/install/windows-install</a>.

                            <br><br>
                            If you have your Docker software installed on your OS, you can open a terminal to test whether
                            the installation is successfully accomplished by typing <code>docker info</code>, where
                            you should not be notified by something like "command is not found". Please take a look at
                            <a href="https://stackoverflow.com/questions/57108228/how-to-check-if-docker-is-running-on-windows" target="_blank"
                               class="stretched-link text-secondary" style="position: relative;">
                                here</a>.
                            <br><br>
                            After successful installation of Docker, you can put the following command in the terminal.
                            You are prompted by a link. You can include your integrated development environment (IDE
                            for details, please see
                            <a href="https://en.wikipedia.org/wiki/Integrated_development_environment" target="_blank"
                               class="stretched-link text-secondary" style="position: relative;">
                                here</a>
                            ),
                            such as
                            <a href="https://code.visualstudio.com/" target="_blank"
                               class="stretched-link text-secondary" style="position: relative;">
                                Visual Studio Code</a>.
                            You can follow <a href="https://learn.microsoft.com/en-us/visualstudio/docker/tutorials/docker-tutorial" target="_blank"
                                                    class="stretched-link text-secondary" style="position: relative;">
                                an official instruction</a> on their cooperation. Then, you can explore with TMKit.

                        </div>
                        <pre><code class="language-python">docker pull 2003100127/tmkit</code></pre>
                    </div>
                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Installation</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Via PyPi</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Via Github</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">3. Via Docker</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>

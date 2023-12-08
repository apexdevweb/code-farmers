<nav class="navbar navbar-expand-lg bg-body-tertiary" id="subnav">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-images" style="color: #fff;"></i>
                        Image rework
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" target="_blank" href="https://photomosh.com/">Photomosh.com</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://www.text-image.com/convert/">Text-Image.com</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://www.remove.bg/fr">RemoveBG.fr</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://imageslidermaker.com/v2">SliderMaker.com</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://www.unscreen.com/upload">Unscreen.com</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-image" style="color: #fff;"></i>
                        Wallpapper & icon
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" target="_blank" href="https://www.peakpx.com/">Peakpx.com</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://unsplash.com/fr">Unsplash.com</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://www.pngwing.com/">Pngwing.com</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://pixabay.com/fr/">Pixabay.com</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://fr.freepik.com/">Freepik.com</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://www.pexels.com/">Pexels.com</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://iconmonstr.com/">Iconmonstr.com</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://fontawesome.com/">Fontawesome.com</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-microchip" style="color: #fff;"></i>
                        A.i
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" target="_blank" href="https://app.rask.ai/auth">Rask</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://creator.nightcafe.studio/">Nightcafe</a></li>
                        <li><a class="dropdown-item" target="_blank" href="https://openai.com/gpt-4">GPT-4</a></li>
                    </ul>
                </li>
                <?php
                if (isset($_SESSION['confirmkey'])) {
                    if (isset($_SESSION['valideAuth'])) {
                ?>
                        <li class="nav-item">
                            <a class="nav-link" href="https://discord.gg/NjcmEd7n/" role="button" aria-expanded="false"><i class="fa-brands fa-discord" style="color: #fff;"></i>
                                #Officiale-Discord-Europe
                            </a>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
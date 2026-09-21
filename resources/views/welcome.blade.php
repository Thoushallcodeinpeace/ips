@php
    $processes = [
        [
            'num' => '01',
            'id' => 'disclosure',
            'title' => 'Invention Disclosure',
            'body' =>
                "The record starts here. A researcher submits what they've built before it's shared publicly, so the office can weigh patentability while the option is still open.",
            'chips' => ['Control number', 'Inventors & shares', 'Funding source', 'Prior disclosure date'],
            'image' => 'students.jpg',
            'image_alt' => 'Students working together in the research center',
        ],
        [
            'num' => '02',
            'id' => 'ip-tracking',
            'title' => 'IP Tracking & Protection',
            'body' =>
                'Once a disclosure is accepted, the office files, prosecutes, and maintains the right — watching deadlines that, if missed, can close the door on protection for good.',
            'chips' => ['Filing date', 'Jurisdiction', 'Prosecution deadlines', 'Grant & expiry'],
            'image' => null,
            'image_alt' => null,
        ],
        [
            'num' => '03',
            'id' => 'commercialization',
            'title' => 'Commercialization',
            'body' =>
                'A protected technology finds its way to market — licensed, spun off, or sold — with terms negotiated and revenue tracked back to the people who invented it.',
            'chips' => ['Route to market', 'Royalty terms', 'Partner', 'Agreement status'],
            'image' => 'collaboration.jpg',
            'image_alt' => 'Staff collaborating with a partner organization',
        ],
        [
            'num' => '04',
            'id' => 'tech-transfer',
            'title' => 'Technology Transfer',
            'body' =>
                "The agreement becomes real: documentation, training, and materials move to the partner, and the office follows the technology's impact after handover.",
            'chips' => ['Handover type', 'Verification', 'Impact reports'],
            'image' => null,
            'image_alt' => null,
        ],
    ];

    $navLabels = [
        'disclosure' => 'Disclosure',
        'ip-tracking' => 'IP Tracking',
        'commercialization' => 'Commercialization',
        'tech-transfer' => 'Technology Transfer',
    ];

    $sections = collect($processes)
        ->map(fn($p) => ['id' => $p['id'], 'label' => $navLabels[$p['id']]])
        ->prepend(['id' => 'overview', 'label' => 'Overview'])
        ->all();
@endphp
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IP & Innovation Management System</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,400;0,500;0,600;1,400&family=IBM+Plex+Sans:wght@400;500;600;700&display=swap"
            rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            paper: '#F5F8FC',
                            surface: '#FFFFFF',
                            surface2: '#E7F0FA',
                            ink: '#122B4D',
                            inksoft: '#4C6079',
                            brass: '#2F6FBB',
                            brassdeep: '#0F3D75',
                            teal: '#2F6FBB',
                            line: '#D3E1F0',
                        },
                        fontFamily: {
                            serif: ['"Newsreader"', 'serif'],
                            sans: ['"IBM Plex Sans"', 'sans-serif'],
                        },
                    },
                },
            };
        </script>

        <style>
            @media (prefers-reduced-motion: reduce) {
                html {
                    scroll-behavior: auto !important;
                }

                * {
                    transition: none !important;
                    animation: none !important;
                }
            }

            #side-nav {
                position: fixed;
                left: 1.5rem;
                top: 50%;
                z-index: 50;
                transform: translate(-14px, -50%);
                opacity: 0;
                pointer-events: none;
                transition: opacity .25s ease, transform .25s ease;
            }

            #side-nav.nav-visible {
                transform: translate(0, -50%);
                opacity: 1;
                pointer-events: auto;
            }

            @media (max-width: 1023px) {
                #side-nav {
                    display: none;
                }
            }

            .side-link-bar {
                height: 0;
            }

            .side-link-label {
                transition: transform .2s ease, color .2s ease;
            }

            .side-link:hover .side-link-label,
            .side-link.is-active .side-link-label {
                color: #122B4D;
                transform: translateX(3px);
            }

            .side-link:hover .side-link-bar,
            .side-link.is-active .side-link-bar {
                height: 1.1rem;
            }

            .side-link-bar {
                transition: height .2s ease;
            }

            .nav-pill {
                transition: background-color .15s ease, color .15s ease, border-color .15s ease;
            }

            .nav-pill.is-active {
                background-color: #122B4D;
                color: #F5F8FC;
                border-color: #122B4D;
            }

            .chip {
                border: 1px solid #D3E1F0;
                color: #4C6079;
            }

            ::selection {
                background: #2F6FBB;
                color: #F5F8FC;
            }

            .login-btn.on-hero {
                background-image: none !important;
                background-color: transparent !important;
                border-color: rgba(255, 255, 255, .35) !important;
                box-shadow: none !important;
            }

            .login-btn.on-hero:hover {
                background-image: linear-gradient(135deg, rgba(47, 111, 187, .9), rgba(15, 61, 117, .95)) !important;
                border-color: transparent !important;
                box-shadow: 0 10px 15px -3px rgba(18, 43, 77, .2) !important;
            }

            #home {
                background-image: url('{{ asset('landing/ripe.jpg') }}');
            }
        </style>
    </head>

    <body class="bg-paper text-ink font-sans antialiased">

        {{-- Login trigger — transparent over the hero, blue elsewhere, opens the slide-in login panel --}}
        <button type="button"
            class="login-btn on-hero fixed right-8 top-8 z-50 flex cursor-pointer items-center gap-2 rounded-2xl border border-white/20 bg-gradient-to-br from-brass/90 to-brassdeep/95 px-4 py-2 text-xl font-semibold text-paper shadow-lg shadow-ink/20 transition hover:from-ink/90 hover:to-ink/95 focus:outline-none focus-visible:ring-2 focus-visible:ring-brassdeep focus-visible:ring-offset-2 focus-visible:ring-offset-paper">
            Login
            <div id="login-lottie" class="login-icon h-6 w-6" aria-hidden="true"></div>
        </button>

        {{-- Login panel backdrop --}}
        <div id="login-overlay"
            class="fixed inset-0 z-[55] bg-ink/40 opacity-0 backdrop-blur-sm transition-opacity duration-300 pointer-events-none"
            aria-hidden="true"></div>

        {{-- Login panel — slides in from the right; no backend wiring yet --}}
        <aside id="login-panel"
            class="fixed inset-y-0 right-0 z-[60] w-full max-w-md translate-x-full bg-surface shadow-2xl transition-transform duration-300 ease-out"
            role="dialog" aria-modal="true" aria-labelledby="login-panel-title" aria-hidden="true">
            <div class="flex h-full flex-col overflow-y-auto px-8 py-10 sm:px-10">
                <div class="flex items-center justify-between">
                    <span class="font-serif text-lg text-ink">IP &amp; Innovation Office</span>
                    <button type="button" id="login-close"
                        class="rounded-full p-2 text-inksoft transition hover:bg-surface2 hover:text-ink focus:outline-none focus-visible:ring-2 focus-visible:ring-brassdeep"
                        aria-label="Close login">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M5 5l10 10M15 5L5 15" stroke="currentColor" stroke-width="1.75"
                                stroke-linecap="round" />
                        </svg>
                    </button>
                </div>

                <div class="mt-12">
                    <h2 id="login-panel-title" class="font-serif text-3xl text-ink">Welcome back</h2>
                    <p class="mt-2 text-sm text-inksoft">Sign in to manage disclosures, filings, and deals.</p>
                </div>

                {{-- TODO: wire this to your real auth route once it exists, e.g. action="{{ route('login') }}" method="POST" with @csrf --}}
                <form class="mt-10 flex flex-1 flex-col" onsubmit="return false;">
                    <label for="login-email" class="text-sm font-medium text-ink">Email or username</label>
                    <input id="login-email" type="text" autocomplete="username" placeholder="you@slsu.edu.ph"
                        class="mt-2 rounded-xl border border-line bg-paper px-4 py-3 text-ink placeholder:text-inksoft/60 focus:border-brassdeep focus:outline-none focus:ring-2 focus:ring-brassdeep/30">

                    <label for="login-password" class="mt-6 text-sm font-medium text-ink">Password</label>
                    <div class="relative mt-2">
                        <input id="login-password" type="password" autocomplete="current-password"
                            placeholder="Enter your password"
                            class="w-full rounded-xl border border-line bg-paper px-4 py-3 pr-11 text-ink placeholder:text-inksoft/60 focus:border-brassdeep focus:outline-none focus:ring-2 focus:ring-brassdeep/30">
                        <button type="button" id="login-password-toggle" aria-label="Show password"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-inksoft transition hover:text-ink focus:outline-none">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M1.5 10S4.5 4 10 4s8.5 6 8.5 6-3 6-8.5 6-8.5-6-8.5-6Z" stroke="currentColor"
                                    stroke-width="1.5" />
                                <circle cx="10" cy="10" r="2.5" stroke="currentColor"
                                    stroke-width="1.5" />
                            </svg>
                        </button>
                    </div>

                    <div class="mt-5 flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-inksoft">
                            <input type="checkbox"
                                class="h-4 w-4 rounded border-line text-brassdeep focus:ring-brassdeep">
                            Remember me
                        </label>
                        <a href="#" onclick="return false;"
                            class="font-medium text-brassdeep hover:text-ink">Forgot
                            password?</a>
                    </div>

                    <button type="submit"
                        class="mt-8 w-full rounded-xl bg-brassdeep px-6 py-3 text-base font-semibold text-paper transition hover:bg-ink focus:outline-none focus-visible:ring-2 focus-visible:ring-brassdeep focus-visible:ring-offset-2 focus-visible:ring-offset-paper">
                        Login
                    </button>

                    <div class="mt-6 flex items-center gap-3 text-xs text-inksoft">
                        <span class="h-px flex-1 bg-line"></span>
                        or
                        <span class="h-px flex-1 bg-line"></span>
                    </div>

                    {{-- TODO: point this at your real Google OAuth route once it exists --}}
                    <button type="button" onclick="return false;"
                        class="mt-6 flex w-full items-center justify-center gap-3 rounded-xl border border-line bg-surface px-6 py-3 text-sm font-semibold text-ink transition hover:bg-surface2 focus:outline-none focus-visible:ring-2 focus-visible:ring-brassdeep focus-visible:ring-offset-2 focus-visible:ring-offset-paper">
                        <svg width="18" height="18" viewBox="0 0 18 18" aria-hidden="true">
                            <path fill="#4285F4"
                                d="M17.64 9.2c0-.64-.06-1.25-.16-1.84H9v3.48h4.84a4.14 4.14 0 0 1-1.8 2.72v2.26h2.9c1.7-1.57 2.68-3.87 2.68-6.62Z" />
                            <path fill="#34A853"
                                d="M9 18c2.43 0 4.47-.8 5.96-2.18l-2.9-2.26c-.8.54-1.84.86-3.06.86-2.35 0-4.34-1.59-5.05-3.72H.98v2.33A9 9 0 0 0 9 18Z" />
                            <path fill="#FBBC05"
                                d="M3.95 10.7A5.4 5.4 0 0 1 3.67 9c0-.59.1-1.17.28-1.7V4.97H.98A9 9 0 0 0 0 9c0 1.45.35 2.83.98 4.03l2.97-2.33Z" />
                            <path fill="#EA4335"
                                d="M9 3.58c1.32 0 2.51.46 3.44 1.35l2.58-2.58C13.46.89 11.43 0 9 0A9 9 0 0 0 .98 4.97l2.97 2.33C4.66 5.17 6.65 3.58 9 3.58Z" />
                        </svg>
                        Login with Google
                    </button>

                    <p class="mt-6 text-center text-sm text-inksoft">
                        Need access?
                        <a href="#" onclick="return false;"
                            class="font-medium text-brassdeep hover:text-ink">Contact
                            your office administrator</a>
                    </p>
                </form>
            </div>
        </aside>

        {{-- Side nav: hidden until the hero nav row scrolls out of view --}}
        <aside id="side-nav" aria-hidden="true">
            <nav
                class="side-nav-card flex flex-col gap-1 rounded-2xl border border-line/70 bg-white/50 p-3 shadow-lg shadow-ink/5 backdrop-blur-md">
                @foreach ($sections as $section)
                    <a href="#{{ $section['id'] }}" data-nav-link data-target="{{ $section['id'] }}"
                        class="side-link group relative flex items-center rounded-lg py-2 pl-4 pr-5 text-sm font-medium text-inksoft focus:outline-none focus-visible:ring-2 focus-visible:ring-brassdeep">
                        <span
                            class="side-link-bar absolute left-0 top-1/2 w-0.5 -translate-y-1/2 rounded-full bg-brassdeep"
                            aria-hidden="true"></span>
                        <span class="side-link-label inline-block">{{ $section['label'] }}</span>
                    </a>
                @endforeach
            </nav>
        </aside>

        <main>
            {{-- Hero — full-bleed background photo with a dark overlay for text contrast --}}
            <section id="home"
                class="relative flex min-h-screen items-center overflow-hidden bg-ink bg-cover bg-center">
                <div class="absolute inset-0 bg-gradient-to-br from-ink/85 via-ink/75 to-ink/90" aria-hidden="true">
                </div>

                <div class="relative z-10 mx-auto w-full max-w-6xl flex-col px-6 py-24">
                    <span class="font-serif text-lg text-paper">IP &amp; Innovation Office</span>

                    <h1 class="mt-10 max-w-3xl font-serif text-5xl leading-[1.1] text-paper sm:text-6xl">
                        Every invention, tracked from idea to impact.
                    </h1>

                    <p class="mt-6 max-w-xl text-lg leading-relaxed text-white/75">
                        One shared record for disclosures, filings, licensing deals, and transfers —
                        so nothing about an invention's story gets lost between offices.
                    </p>

                    {{-- Hero nav row: this is what's watched to trigger the side nav --}}
                    <div id="hero-nav"
                        class="mt-12 flex gap-2 overflow-x-auto pb-2 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        @foreach ($sections as $section)
                            <a href="#{{ $section['id'] }}" data-nav-link data-target="{{ $section['id'] }}"
                                class="nav-pill shrink-0 rounded-full bg-white/90 px-5 py-2 text-sm font-medium text-ink shadow-sm backdrop-blur-sm hover:bg-white focus:outline-none focus-visible:ring-2 focus-visible:ring-brassdeep focus-visible:ring-offset-2 focus-visible:ring-offset-ink">{{ $section['label'] }}</a>
                        @endforeach
                    </div>

                    <div class="mt-10">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center rounded-full bg-brassdeep px-6 py-3 text-sm font-semibold text-paper transition hover:bg-white hover:text-ink focus:outline-none focus-visible:ring-2 focus-visible:ring-brassdeep focus-visible:ring-offset-2 focus-visible:ring-offset-ink">
                                Sign in
                            </a>
                        @else
                            <a href="#overview"
                                class="inline-flex items-center rounded-full bg-brassdeep px-6 py-3 text-sm font-semibold text-paper transition hover:bg-white hover:text-ink focus:outline-none focus-visible:ring-2 focus-visible:ring-brassdeep focus-visible:ring-offset-2 focus-visible:ring-offset-ink">
                                See how it works
                            </a>
                        @endif
                    </div>
                </div>
            </section>

            {{-- Overview --}}
            <section id="overview" class="flex min-h-screen items-center border-t border-line bg-surface">
                <div class="mx-auto w-full max-w-6xl px-6 py-24">
                    <div class="grid gap-12 md:grid-cols-2 md:items-center">
                        <div>
                            <h2 class="font-serif text-3xl text-ink sm:text-4xl">One pipeline, one record.</h2>
                            <p class="mt-5 leading-relaxed text-inksoft">
                                An invention moves through four stages on its way from a researcher's notes to something
                                the world can use. Each stage hands the next one what it needs — the same technology
                                record, carried forward, rather than four disconnected logs.
                            </p>
                        </div>

                        <div class="overflow-hidden rounded-2xl border border-line shadow-sm">
                            <img src="{{ asset('landing/background.jpg') }}" alt="The SLSU campus"
                                class="h-64 w-full object-cover sm:h-80" loading="lazy" decoding="async">
                        </div>
                    </div>

                    {{-- Simple sequence connector, mirroring the actual pipeline order --}}
                    <div class="mt-16 flex flex-wrap items-start gap-y-10">
                        @foreach ($processes as $p)
                            <a href="#{{ $p['id'] }}"
                                class="group flex flex-1 min-w-[140px] flex-col items-center text-center">
                                <span
                                    class="flex h-11 w-11 items-center justify-center rounded-full border border-brass text-sm font-semibold text-brassdeep transition group-hover:bg-brassdeep group-hover:text-paper">
                                    {{ $p['num'] }}
                                </span>
                                <span class="mt-3 text-sm font-medium text-ink">{{ $p['title'] }}</span>
                            </a>
                            @if (!$loop->last)
                                <div class="mt-[22px] hidden h-px flex-1 bg-line sm:block" aria-hidden="true"></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- Process sections --}}
            @foreach ($processes as $p)
                <section id="{{ $p['id'] }}"
                    class="flex min-h-screen items-center border-t border-line {{ $loop->even ? 'bg-surface2' : 'bg-paper' }}">
                    <div class="mx-auto w-full max-w-6xl px-6 py-24">
                        <div
                            class="flex flex-col gap-12 md:items-center md:gap-16 {{ $loop->even ? 'md:flex-row-reverse' : 'md:flex-row' }}">
                            <div class="flex-1">
                                <span class="font-serif text-2xl text-brassdeep">{{ $p['num'] }}</span>
                                <h2 class="mt-3 font-serif text-3xl text-ink sm:text-4xl">{{ $p['title'] }}</h2>
                                <p class="mt-5 max-w-md leading-relaxed text-inksoft">{{ $p['body'] }}</p>
                            </div>

                            <div class="flex-1">
                                <div class="overflow-hidden rounded-2xl border border-line bg-surface shadow-sm">
                                    @if ($p['image'])
                                        <img src="{{ asset('landing/' . $p['image']) }}" alt="{{ $p['image_alt'] }}"
                                            class="h-48 w-full object-cover sm:h-56" loading="lazy" decoding="async">
                                    @endif
                                    <div class="p-6">
                                        <p class="text-sm font-medium text-inksoft">What this stage captures</p>
                                        <div class="mt-4 flex flex-wrap gap-2">
                                            @foreach ($p['chips'] as $chip)
                                                <span
                                                    class="chip rounded-full px-3 py-1 text-sm">{{ $chip }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
        </main>

        <footer class="border-t border-line bg-ink">
            <div class="mx-auto max-w-6xl px-6 py-14">
                <div class="flex flex-col gap-8 sm:flex-row sm:items-start sm:justify-between">
                    <div class="max-w-sm">
                        <span class="font-serif text-lg text-paper">IP &amp; Innovation Office</span>
                        <p class="mt-3 text-sm leading-relaxed text-paper/60">
                            A single record for every invention, from first disclosure to its place in the market.
                        </p>
                    </div>

                    <nav class="flex flex-col gap-2 text-sm">
                        @foreach ($sections as $section)
                            <a href="#{{ $section['id'] }}"
                                class="text-paper/70 transition hover:text-paper">{{ $section['label'] }}</a>
                        @endforeach
                    </nav>
                </div>

                <p class="mt-12 text-xs text-paper/40">&copy; {{ date('Y') }} IP &amp; Innovation Office.</p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/lottie-web@5.12.2/build/player/lottie.min.js"></script>
        <script>
            (function() {
                const heroNav = document.getElementById('hero-nav');
                const sideNav = document.getElementById('side-nav');
                const navLinks = document.querySelectorAll('[data-nav-link]');
                const sections = document.querySelectorAll('main section[id]');
                const loginBtn = document.querySelector('.login-btn');
                const loginLottieEl = document.getElementById('login-lottie');

                // Login panel: slides in from the right when the login button is clicked
                const loginOverlay = document.getElementById('login-overlay');
                const loginPanel = document.getElementById('login-panel');
                const loginClose = document.getElementById('login-close');
                const loginEmail = document.getElementById('login-email');

                function openLoginPanel() {
                    loginOverlay.classList.remove('opacity-0', 'pointer-events-none');
                    loginOverlay.setAttribute('aria-hidden', 'false');
                    loginPanel.classList.remove('translate-x-full');
                    loginPanel.setAttribute('aria-hidden', 'false');
                    document.documentElement.classList.add('overflow-hidden');
                    window.setTimeout(() => loginEmail?.focus(), 300);
                }

                function closeLoginPanel() {
                    loginOverlay.classList.add('opacity-0', 'pointer-events-none');
                    loginOverlay.setAttribute('aria-hidden', 'true');
                    loginPanel.classList.add('translate-x-full');
                    loginPanel.setAttribute('aria-hidden', 'true');
                    document.documentElement.classList.remove('overflow-hidden');
                    loginBtn?.focus();
                }

                loginBtn?.addEventListener('click', openLoginPanel);
                loginClose?.addEventListener('click', closeLoginPanel);
                loginOverlay?.addEventListener('click', closeLoginPanel);
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && loginPanel && !loginPanel.classList.contains('translate-x-full')) {
                        closeLoginPanel();
                    }
                });

                // Password visibility toggle inside the login panel
                const pwInput = document.getElementById('login-password');
                const pwToggle = document.getElementById('login-password-toggle');
                pwToggle?.addEventListener('click', () => {
                    const showing = pwInput.type === 'text';
                    pwInput.type = showing ? 'password' : 'text';
                    pwToggle.setAttribute('aria-label', showing ? 'Show password' : 'Hide password');
                });

                // Login icon: plays the Lottie animation on hover, resets to frame 0 on mouse leave
                if (loginBtn && loginLottieEl && window.lottie) {
                    const loginAnim = lottie.loadAnimation({
                        container: loginLottieEl,
                        renderer: 'svg',
                        loop: true,
                        autoplay: false,
                        path: '{{ asset('landing/login-icon.json') }}',
                    });
                    loginBtn.addEventListener('mouseenter', () => loginAnim.play());
                    loginBtn.addEventListener('mouseleave', () => {
                        loginAnim.stop();
                    });
                }

                // Login button: transparent while the hero is on screen, blue everywhere else
                const heroSection = document.getElementById('home');
                if (loginBtn && heroSection) {
                    const heroSectionObserver = new IntersectionObserver(
                        ([entry]) => {
                            loginBtn.classList.toggle('on-hero', entry.isIntersecting);
                        }, {
                            threshold: 0.5
                        }
                    );
                    heroSectionObserver.observe(heroSection);
                }

                // Show the side nav card only once the hero nav row is no longer visible
                if (heroNav && sideNav) {
                    const heroObserver = new IntersectionObserver(
                        ([entry]) => {
                            sideNav.classList.toggle('nav-visible', !entry.isIntersecting);
                            sideNav.setAttribute('aria-hidden', entry.isIntersecting ? 'true' : 'false');
                        }, {
                            threshold: 0
                        }
                    );
                    heroObserver.observe(heroNav);
                }

                // Highlight the active section in both nav sets
                if (sections.length) {
                    const spyObserver = new IntersectionObserver(
                        (entries) => {
                            entries.forEach((entry) => {
                                if (!entry.isIntersecting) return;
                                const id = entry.target.id;
                                navLinks.forEach((link) => {
                                    link.classList.toggle('is-active', link.dataset.target === id);
                                });
                            });
                        }, {
                            rootMargin: '-45% 0px -45% 0px',
                            threshold: 0
                        }
                    );
                    sections.forEach((s) => spyObserver.observe(s));
                }
            })();
        </script>
    </body>

</html>

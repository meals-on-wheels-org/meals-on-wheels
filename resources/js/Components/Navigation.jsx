import { Link } from '@inertiajs/react';

export default function Navigation() {
    return (
        <nav className="bg-white border-b border-gray-100">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex justify-between h-16">
                    <div className="flex">
                        <div className="flex-shrink-0 flex items-center">
                            <Link href="/">
                                <ApplicationLogo className="block h-9 w-auto" />
                            </Link>
                        </div>

                        <div className="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <NavLink href={route('homepage')} active={route().current('homepage')}>
                                Home
                            </NavLink>
                            <NavLink href={route('about-us')} active={route().current('about-us')}>
                                About Us
                            </NavLink>
                            <NavLink href={route('volunteer')} active={route().current('volunteer')}>
                                Volunteer
                            </NavLink>
                            <NavLink href={route('donate')} active={route().current('donate')}>
                                Donate
                            </NavLink>
                            <NavLink href={route('dashboard')} active={route().current('dashboard')}>
                                Dashboard
                            </NavLink>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    );
}

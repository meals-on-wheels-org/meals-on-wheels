import { Head, Link } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function Homepage({ auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-600 leading-tight">Merry Meals</h2>}
        >
            <Head title="Homepage"/>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            {/* Hero Section */}
                            <div className="mb-10 text-center">
                                <h1 className="text-4xl font-bold mb-4">Welcome to Merry Meals</h1>
                                <p className="text-lg text-gray-600 dark:text-gray-400">
                                    Delivering hot meals and warm smiles to those in need
                                </p>
                            </div>

                            {/* Action Cards */}
                            <div className="grid md:grid-cols-3 gap-6 mt-8">
                                <div className="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div className="p-6">
                                        <h3 className="text-xl font-semibold mb-4">Volunteer</h3>
                                        <p className="text-gray-600 dark:text-gray-400 mb-4">Join our team of dedicated volunteers</p>
                                        <Link
                                            href={route('volunteer')}
                                            className="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                        >
                                            Get Started
                                        </Link>
                                    </div>
                                </div>

                                <div className="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div className="p-6">
                                        <h3 className="text-xl font-semibold mb-4">Donate</h3>
                                        <p className="text-gray-600 dark:text-gray-400 mb-4">Support our mission with a donation</p>
                                        <Link
                                            href={route('donate')}
                                            className="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                        >
                                            Donate Now
                                        </Link>
                                    </div>
                                </div>

                                <div className="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div className="p-6">
                                        <h3 className="text-xl font-semibold mb-4">About Us</h3>
                                        <p className="text-gray-600 dark:text-gray-400 mb-4">Learn more about our mission</p>
                                        <Link
                                            href={route('about-us')}
                                            className="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                        >
                                            Learn More
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}


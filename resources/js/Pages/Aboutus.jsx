import { Head } from '@inertiajs/react';
import Layout from '@/Layouts/Layout';

export default function AboutUs() {
    return (
        <Layout>
            <Head title="About Us - Merry Meals" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h1 className="text-3xl font-bold mb-6">About Merry Meals</h1>
                    {/* Add your about us content */}
                </div>
            </div>
        </Layout>
    );
}

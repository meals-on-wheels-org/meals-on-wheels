import { Head } from '@inertiajs/react';
import Layout from '@/Layouts/Layout';

export default function FundraisingCampaigns() {
    return (
        <Layout>
            <Head title="Donate - Merry Meals" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h1 className="text-3xl font-bold mb-6">Support Our Mission</h1>
                    {/* Add your donation campaigns content */}
                </div>
            </div>
        </Layout>
    );
}

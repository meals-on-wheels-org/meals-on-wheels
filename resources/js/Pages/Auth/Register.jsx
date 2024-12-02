import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link, useForm } from '@inertiajs/react';
import { useState } from 'react';

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        role:'',
    });

    // const handleRegister = (role) => {
    //     setData("role", role);
    //     post(route("register"), {
    //         onSuccess: () => {
    //             Inertia.visit(route(`${role}.form`)); // Redirect to role-specific form
    //         },
    //     });
    // };
    const [isSubmitting, setIsSubmitting] = useState(false);
    const handleRoleSelection = (role) => {
        // Set the selected role
        setData("role", role);

        // Submit the basic registration form
        setIsSubmitting(true);
        post(route("register"), {
            onSuccess: () => {
                // Redirect to the role-specific form after successful registration
                inertia.visit(route(`${role}.form`));
            },
            onError: () => {
                setIsSubmitting(false); // Allow re-submission if there's an error
            },
        });
    };

    return (
        <GuestLayout>
            <Head title="Register" />

            <form>
                <div>
                    <InputLabel htmlFor="name" value="Name" />

                    <TextInput
                        id="name"
                        name="name"
                        value={data.name}
                        className="mt-1 block w-full"
                        autoComplete="name"
                        isFocused={true}
                        onChange={(e) => setData('name', e.target.value)}
                        required
                    />

                    <InputError message={errors.name} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        onChange={(e) => setData('email', e.target.value)}
                        required
                    />

                    <InputError message={errors.email} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password', e.target.value)}
                        required
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel
                        htmlFor="password_confirmation"
                        value="Confirm Password"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) =>
                            setData('password_confirmation', e.target.value)
                        }
                        required
                    />

                    <InputError
                        message={errors.password_confirmation}
                        className="mt-2"
                    />
                </div>
                <div>
                    <button type="button" onClick={() => handleRoleSelection("member")} 
                        disabled={isSubmitting}>
                        Register as Member
                    </button>
                    <button type="button" onClick={() => handleRoleSelection("caregiver")} 
                        disabled={isSubmitting}>
                        Register as CareGiver
                    </button>
                    <button type="button" onClick={() => handleRoleSelection("partner")} 
                        disabled={isSubmitting}>
                        Register as Partner
                    </button>
                    <button type="button" onClick={() => handleRoleSelection("volunteer")} 
                        disabled={isSubmitting}>
                        Register as Volunteer
                    </button>
                </div>
            </form>
        </GuestLayout>
    );
}

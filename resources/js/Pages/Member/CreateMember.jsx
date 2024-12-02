import React, { useState } from "react";
import { Head, useForm } from "@inertiajs/react";
import GuestLayout from "@/Layouts/GuestLayout";
import TextAreaInput from "@/Components/TextAreaInput";
import InputLabel from "@/Components/InputLabel";
import TextInput from "@/Components/TextInput";
import InputError from "@/Components/InputError";

export default function MemberForm() {
    const { data, setData, post, errors } = useForm({
        address: "",
        phonenumber: "",
        age: "",
        dietary_restriction: "",
        disease_suffering: "",
        disability: "",
    });

    const onSubmit = (e) => {
        e.preventDefault();
        post(route("member.store"));
    };

    return (
        <div>
            <Head title="Create Member" />
            <form onSubmit={onSubmit}
                className="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    <InputLabel htmlFor="addrss" value="Address" />
                    <TextInput
                        id="address"
                        name="address"
                        value={data.address}
                        className="mt-1 block w-full"
                        autoComplete="address"
                        isFocused={true}
                        onChange={(e) => setData('address', e.target.value)}
                        required
                    />

                    <InputError message={errors.name} className="mt-2" />
                </div>
                <div>
                    <InputLabel htmlFor="phonenumber" value="Phonenumber" />
                    <TextInput
                        id="phonenumber"
                        name="phonenumber"
                        value={data.phonenumber}
                        className="mt-1 block w-full"
                        autoComplete="phonenumber"
                        isFocused={true}
                        onChange={(e) => setData('phonenumber', e.target.value)}
                        required
                    />
                    <InputError message={errors.phonenumber} className="mt-2" />
                </div>
                <div>
                    <InputLabel htmlFor="age" value="Age" />
                    <TextInput
                        id="age"
                        name="age"
                        value={data.age}
                        className="mt-1 block w-full"
                        autoComplete="age"
                        isFocused={true}
                        onChange={(e) => setData('age', e.target.value)}
                        required
                    />

                    <InputError message={errors.age} className="mt-2" />
                </div>
                <div className="mt-4">
                    <InputLabel
                        htmlFor="dietary_restriction"
                        value="Dietary Restriction"
                    />

                    <TextAreaInput
                        id="dietary_restriction"
                        name="dietary_restriction"
                        value={data.dietary_restriction}
                        className="mt-1 block w-full"
                        onChange={(e) => setData("dietary_restriction", e.target.value)}
                    />

                    <InputError message={errors.dietary_restriction} className="mt-2" />
                </div>
                <div className="mt-4">
                    <InputLabel
                        htmlFor="disease_suffering"
                        value="Disease Suffering"
                    />

                    <TextAreaInput
                        id="disease_suffering"
                        name="disease_suffering"
                        value={data.disease_suffering}
                        className="mt-1 block w-full"
                        onChange={(e) => setData("disease_suffering", e.target.value)}
                    />

                    <InputError message={errors.disease_suffering} className="mt-2" />
                </div>
                <div>
                    <InputLabel htmlFor="disability" value="Disability" />
                    <TextInput
                        id="disability"
                        name="disability"
                        value={data.disability}
                        className="mt-1 block w-full"
                        autoComplete="disability"
                        isFocused={true}
                        onChange={(e) => setData('disability', e.target.value)}
                        required
                    />

                    <InputError message={errors.disability} className="mt-2" />
                </div>
                <button className="bg-emerald-500 py-1 px-3 text-white rounded shadow transition-all hover:bg-emerald-600">
                    Submit
                </button>
            </form>
        </div>
    );
}

export interface User {
    id: number;
    fullname: string;
    username: string;
    password: string;
    email: string;
    is_active: boolean;
    is_admin: boolean;
    remember_token: string | null;
    created_at: string;
    updated_at: string;
}

export interface Student {
    id: number;
    fullname: string;
    surname: string;
    phone: string;
    birthdate: string;
    birth_city: string;
    school_origin: string;
    student_picture: string;
    address: string;
    nisn: string;
    gender: string;
    path_id: number;
    batch_id: number;
    user_id: number;
    created_at: string;
    updated_at: string;
}

export interface StudentRegistration {
    id: number;
    registration_date: string | null;
    registration_number: string | null;
    period: string;
    selected_major: string | null;
    student_id: number;
    created_at: string;
    updated_at: string;
}

export interface RegistrationPath {
    id: number;
    path_name: string;
    path_type: 'PURCHASING' | 'RETURNING';
    created_at: string;
    updated_at: string;
}

export interface RegistrationBatch {
    id: number;
    batch_name: string;
    batch_type: string; // This should be related to path_type
    open_date: string;
    closed_date: string;
    path_id: number;
    created_at: string;
    updated_at: string;
}

export interface PaymentInfo {
    id: number;
    bank_name: string;
    account_number: string;
    account_name: string;
    price: number;
    batch_id: number;
    created_at: string;
    updated_at: string;
}

export interface PaymentStudent {
    id: number;
    name: string;
    bank_name: string;
    payment_method: 'CASH' | 'TRANSFER' | 'CASH_INSTALLMENT' | 'TRANSFER_INSTALLMENT';
    payment_picture: string;
    status_payment: 'PENDING' | 'CONFIRMED';
    confirmed_by: string;
    student_id: number;
    student_registration_id: number;
    created_at: string;
    updated_at: string;
}
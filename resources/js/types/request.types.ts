export interface StudentRegistrationDTO {
    fullname: string,
    email: string,
    phone: string,
    school_origin: string,
    gender: string
}

export interface AdminRegistrationDTO {
    fullname: string,
    username: string,
    password: string,
    email: string,
}

export interface UserLoginDTO {
    username: string,
    password: string,
}

export interface RegistrationPathCreateDTO {
    path_name: string,
    path_type: string,
}
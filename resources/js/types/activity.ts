export interface Activity {
    id: number;
    name: string;
    description: string;

    activity_groups: ActivityGroup[];
}

export interface ActivityGroup {
    id: number;
    name: string;
}

export interface Organizer {
    id: number;
    name: string;
}

export interface Participant {
    id: number;
    name: string;
}

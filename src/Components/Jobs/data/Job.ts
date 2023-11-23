import type ReactChild from 'react';

export interface Job {
    id: string;
    name: string;
    position: string;
    image: any;
    period: {
        start: string;
        end?: string;
    };
    paragraphs: ReactChild.JSX.Element[];
}

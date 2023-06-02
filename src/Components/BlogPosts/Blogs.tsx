import ReactChild from "react";

export interface BlogPost {
    url: string;
    title: string;
    date: string;
    source: string;
    paragraph: ReactChild.JSX.Element;
}

export const blogs: BlogPost[] = [
    {
        url: "https://www.testim.io/blog/mocking-in-testing/",
        date: "January 05, 2022",
        title: "Mocking in Testing: from zero to hero",
        source: "Testim IO blog",
        paragraph: <>in end-to-end (E2E) automated testing, we attempt to simulate how the end-user would use the product—clicking on buttons, filling out forms, etc.—to see if the UI produces the expected results. The product relies on many smaller pieces like React/Angular/Vue components or functions that process data from the database in the backend.</>
    }
];

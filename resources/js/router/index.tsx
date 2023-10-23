import {Route, Routes} from "react-router-dom";
import {lazy, Suspense} from "react";

const AppRoutes = () => {
    const routes = [
        {
            id: "1",
            path: "/",
            component: lazy(() => import("../pages/Home")),
        },
        {
            id: "2",
            path: "/:ID/attendance",
            component: lazy(() => import("../pages/Attendance")),
        }
    ];
    return (
        <>
            <Routes>
                {routes?.map((item) => (
                    <Route
                        key={item?.id}
                        path={item?.path}
                        element={
                            <Suspense>
                                <item.component/>
                            </Suspense>
                        }>
                    </Route>
                ))}
            </Routes>
        </>
    );
}
export default AppRoutes;

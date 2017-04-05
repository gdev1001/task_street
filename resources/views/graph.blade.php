<script type="text/javascript" src="{{asset('js/Chart.js') }}"></script>
<script type="text/javascript" src="{{asset('js/MultiLevelPieChart.js') }}"></script>
<script type="text/javascript" src="{{asset('js/Please.js') }}"></script>



<div id = 'main_circle' style = "width: 600px; height: 600px;margin-left: 31%;margin-top: -41%;">
    <canvas  id="demo" class = "main_circle" width="600" height="600"></canvas>
</div>
<script>
    (function(){
        var canvas = document.getElementById('demo'),
                ctx = canvas.getContext('2d'),
                config = {
                    responsive: true
                };

        new Chart(ctx).MultiLevelPie(
                [
                    {
                        label: "Foo",
                        value: 1000,
                        color: Please.make_color()[0],
                        children: [
                            {
                                label: "Bar",
                                value: 300,
                                color: Please.make_color()[0],
                                children: [
                                    {
                                        label: "Baz",
                                        value: 30,
                                        color: Please.make_color()[0],
                                        children: []
                                    },
                                    {
                                        label: "Baz",
                                        value: 30,
                                        color: Please.make_color()[0],
                                        children: []
                                    },
                                    {
                                        label: "Baz",
                                        value: 30,
                                        color: Please.make_color()[0],
                                        children: []
                                    },
                                    {
                                        label: "Baz",
                                        value: 30,
                                        color: Please.make_color()[0],
                                        children: []
                                    },
                                    {
                                        label: "Baz",
                                        value: 30,
                                        color: Please.make_color()[0],
                                        children: []
                                    },
                                    {
                                        label: "Baz",
                                        value: 30,
                                        color: Please.make_color()[0],
                                        children: []
                                    },
                                    {
                                        label: "Baz",
                                        value: 30,
                                        color: Please.make_color()[0],
                                        children: []
                                    },
                                    {
                                        label: "Baz",
                                        value: 30,
                                        color: Please.make_color()[0],
                                        children: []
                                    },
                                    {
                                        label: "Baz",
                                        value: 30,
                                        color: Please.make_color()[0],
                                        children: []
                                    },
                                    {
                                        label: "Baz",
                                        value: 30,
                                        color: Please.make_color()[0],
                                        children: []
                                    }
                                ]
                            },
                            {
                                label: "Demo",
                                value: 700,
                                color: Please.make_color()[0],
                                children: []
                            }
                        ]
                    },
                    {
                        label: "Root",
                        value: 500,
                        color: Please.make_color()[0],
                        children: [
                            {
                                label: "Second",
                                value: 300,
                                color: Please.make_color()[0],
                                children: []
                            },
                            {
                                label: "First",
                                value: 200,
                                color: Please.make_color()[0],
                                children: [
                                    {
                                        label: "Child",
                                        value: 50,
                                        color: Please.make_color()[0],
                                        children: [
                                            {
                                                label: "Child",
                                                value: 10,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 10,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 10,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 10,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 10,
                                                color: Please.make_color()[0],
                                                children: []
                                            }
                                        ]
                                    },
                                    {
                                        label: "Child",
                                        value: 50,
                                        color: Please.make_color()[0],
                                        children: [
                                            {
                                                label: "Child",
                                                value: 5,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 5,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 5,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 5,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 5,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 5,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 5,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 5,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 5,
                                                color: Please.make_color()[0],
                                                children: []
                                            },
                                            {
                                                label: "Child",
                                                value: 5,
                                                color: Please.make_color()[0],
                                                children: []
                                            }
                                        ]
                                    },
                                    {
                                        label: "Child",
                                        value: 50,
                                        color: Please.make_color()[0],
                                        children: []
                                    },
                                    {
                                        label: "Child",
                                        value: 50,
                                        color: Please.make_color()[0],
                                        children: []
                                    }
                                ]
                            }
                        ]
                    }
                ]);

    }).call(this);

</script>

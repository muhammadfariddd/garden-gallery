@extends('layouts.app')

@section('content')
    <div class="bg-green-300 md:pt-20 pt-10">
        <section class="relative px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32">
            <div class="flex flex-col items-center">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight text-center text-green-800">
                    Plant Care Guide
                </h1>
                <p class="mt-4 text-xl text-gray-600 text-center max-w-2xl">
                    Learn how to keep your plants thriving with our expert care tips and advice.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mt-16">
                <!-- Care Guide Section 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-72 bg-green-100 relative">
                        <img src="https://images.unsplash.com/photo-1597868067509-74889293101f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Watering Tips" class="w-full h-full object-cover">
                    </div>
                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-green-700">Watering Guide</h2>
                        <div class="mt-6 space-y-6 text-gray-600">
                            <div>
                                <h3 class="text-lg font-semibold text-green-600 mb-2">Check Soil Moisture</h3>
                                <p>Before watering, check the soil moisture by inserting your finger about an inch deep. If
                                    it feels dry, it's time to water. If it's still moist, wait a few days before checking
                                    again.</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-green-600 mb-2">Water Thoroughly</h3>
                                <p>When you water, do so thoroughly until water flows from the drainage holes. This ensures
                                    the entire root ball gets moisture. Discard excess water from the saucer after 30
                                    minutes.</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-green-600 mb-2">Follow a Schedule</h3>
                                <p>Create a watering schedule based on your plant's needs. Many plants prefer to dry out
                                    slightly between waterings, while others prefer consistently moist soil.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Care Guide Section 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-72 bg-green-100 relative">
                        <img src="https://images.unsplash.com/photo-1629263560199-7ccdb9dc6013?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Light Requirements" class="w-full h-full object-cover">
                    </div>
                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-green-700">Light Requirements</h2>
                        <div class="mt-6 space-y-6 text-gray-600">
                            <div>
                                <h3 class="text-lg font-semibold text-green-600 mb-2">Direct Light</h3>
                                <p>Plants that need direct light should be placed near south or west-facing windows where
                                    they'll receive at least 6 hours of direct sunlight. Examples include succulents, cacti,
                                    and many flowering plants.</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-green-600 mb-2">Indirect Light</h3>
                                <p>Plants that prefer indirect light should be placed a few feet away from windows or near
                                    east-facing windows. Most tropical foliage plants do well in bright, indirect light.</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-green-600 mb-2">Low Light</h3>
                                <p>Some plants can tolerate low light conditions, such as north-facing windows or areas away
                                    from windows. Snake plants, ZZ plants, and pothos are excellent choices for low light
                                    areas.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Care Guide Section 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-72 bg-green-100 relative">
                        <img src="https://images.unsplash.com/photo-1642952273588-ed6fa28870ac?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Fertilizing Tips" class="w-full h-full object-cover">
                    </div>
                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-green-700">Fertilizing Tips</h2>
                        <div class="mt-6 space-y-6 text-gray-600">
                            <div>
                                <h3 class="text-lg font-semibold text-green-600 mb-2">When to Fertilize</h3>
                                <p>Most plants benefit from fertilizer during their active growing season (spring and
                                    summer). Reduce or stop fertilizing in fall and winter when growth slows down.</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-green-600 mb-2">Types of Fertilizers</h3>
                                <p>Choose a balanced fertilizer for most plants. Specialized fertilizers are available for
                                    specific plant types like cacti, orchids, or flowering plants. Follow package
                                    instructions for application rates.</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-green-600 mb-2">Less is More</h3>
                                <p>It's better to under-fertilize than over-fertilize. Too much fertilizer can burn roots
                                    and damage plants. If in doubt, dilute the fertilizer to half the recommended strength.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Care Guide Section 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-72 bg-green-100 relative">
                        <img src="https://plus.unsplash.com/premium_photo-1678548943300-c138ecccaa34?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Repotting" class="w-full h-full object-cover">
                    </div>
                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-green-700">Repotting Guide</h2>
                        <div class="mt-6 space-y-6 text-gray-600">
                            <div>
                                <h3 class="text-lg font-semibold text-green-600 mb-2">When to Repot</h3>
                                <p>Repot your plants when they become root-bound (roots circling around the pot or growing
                                    out of drainage holes), when growth slows down, or every 1-2 years for most plants.</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-green-600 mb-2">Choosing a Pot</h3>
                                <p>Select a pot that's 1-2 inches larger in diameter than the current pot. Ensure it has
                                    drainage holes. Different plants prefer different pot materials, so research your
                                    specific plant's needs.</p>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-green-600 mb-2">Repotting Process</h3>
                                <p>Water your plant a day before repotting. Gently remove the plant from its current pot,
                                    loosen the roots, and place in the new pot with fresh potting mix. Water thoroughly
                                    after repotting.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
